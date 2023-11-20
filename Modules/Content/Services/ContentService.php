<?php


namespace Modules\Content\Services;



use Illuminate\Support\Facades\Storage;
use App\DataStructures\Content\ContentFileInfoStructure;
use App\DataStructures\Content\ContentUpdateStructure;
use Modules\Content\Entities\Content;
use Modules\Content\Services\PreviewServices\PreviewsServiceAbstract;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\ClearUnconfirmedContentJob;
use Modules\Reviews\Jobs\CreatePreviewJob;
use App\DataStructures\AbstractDataStructure;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ContentService
{
    const MIME_TYPES = ['txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',

        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',];

//с фронта приходят blob файлы - контент для отзывов (тренируемся на них)
    /**
     * с фронта приходят blob файлы - контент для отзывов (тренируемся на них)
     * в ReviewContentService сохраняем временные файлы, через ContentService::saveTempFile(blob файл)
     * в цикле
     * сохраняем сначала временный файл с методом saveTempFile(blob файл)
     * запускаем крон который через время удалит этот файл из временных, если он есть
     *
     *
     *
     * когда от фронта приходит сохранение отзыва в ReviewResourceController::store()
     * вызывается ReviewContentService::updateContentForReview($review)
     * тут обходим контент в цикле для данного отзыва
     * если контент не подтвержденный то сохраняем его постоянно(переименовываем файл)
     * запускаем в кроне PreviewsServices с настройками
     * PreviewsServices генерирует превью и сохраняет файл при помощи ContentService
     *
     *
     *
     *
     *
     *
     */


    //сохраняем временный файл
    //
    //
    //там где вызывается (в контроллере к примеру), настраиваем превью сервисы и передаем в крон



    protected ?Content $content = null;
    protected ?array $previewServices = null;
    public function saveTempFile( $fileBlob ):?Content {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder

        $extension = mb_strtolower($fileBlob->getClientOriginalExtension());
        $fileName = uniqid();
        $fileNameWithExtension = $fileName.'.'.$extension;

        $filePath =  md5(date('Y-m-d'));
//        $filePath =  'tmp';
        Storage::disk('content')->putFileAs($filePath, $fileBlob, $fileNameWithExtension);
        $file = $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension;
        if(!$fileType = $this->getFileType(Storage::disk('content')->path($file))) return null;

        //create job for clear "forget" content
        ClearUnconfirmedContentJob::dispatch($file)->delay(now()->addHours(2));

        return Content::create([
            'file' => $file,
            'url' => Storage::disk('content')->url($file),
            'type' => 'original',
            'typeFile' => $fileType,
            'mime' => $this->getMimeByExtension($extension),

        ]);
    }







    public function saveTempFileForever( string $filePath ):?ContentFileInfoStructure  {
        if(!$filePath) throw new \Exception('not have file');
        $fileFullPath = Storage::disk('content')->path($filePath);
        if(!file_exists($fileFullPath)) return null;

        $fileName = uniqid();
        if(!$fileInfo = pathinfo($filePath)) return null;
        $foreverFilePath = md5(date('Y-m-d')).DIRECTORY_SEPARATOR.$fileName.'.'.$fileInfo['extension'];
        if(!rename($fileFullPath, Storage::disk('content')->path($foreverFilePath))){
            throw new \Exception('impossible save temporally file forever');
        }
        if(!file_exists(Storage::disk('content')->path($foreverFilePath))) return null;
        if(!$fileType = $this->getFileType(Storage::disk('content')->path($foreverFilePath))) return null;
        return (new ContentFileInfoStructure([
            'file' => $foreverFilePath,
            'url' => Storage::disk('content')->url($foreverFilePath),
            'type' => 'original',
            'typeFile' => $fileType,
        ]));
    }

    protected function getFileType(string $file):?string {
        if(!$file = explode('.', $file))    return null; //<<<<<<<<<<<<
        $ext = strtolower(array_pop($file));
        if (!$fileMime = self::MIME_TYPES[$ext])   throw new \Exception('not set mime file'); //<<<<<<<<<<<<
        if(!$fileMime = explode('/', $fileMime))    return null; //<<<<<<<<<<<<
        return $fileMime[0];
    }

    public function getMimeByExtension( string $ext):string    {
        return (isset(self::MIME_TYPES[$ext])) ? self::MIME_TYPES[$ext] : '';
    }


    public function getPath():string    {
        return '';
    }

    public function updateFromArrayForContentable( array $contentInfoAsArray, string $contentable_type, string $contentable_id ):self    {
        if(!$contentInfoForUpdate = $this->contentFromArrayToStructures($contentInfoAsArray, $contentable_type, $contentable_id)) return $this;
        $contentIds = $this->getContentIds($contentInfoForUpdate);
        //check generate previews
        $contentsForPreviews = Content::where('contentable_type', $contentable_type)
            ->where('type', 'original')
            ->where('confirm', 0)
            ->whereIn('id', $contentIds)
            ->get();
        if($contentsForPreviews->count() === 0){
            return $this;
        }
        foreach ($contentsForPreviews as $content){
            if(!$content->confirm){
                if($previewServices = $this->getPreviewServiceForContent($content)){
                    foreach ($previewServices as $previewService){
                        //dont forget to run  Supervisor  php artisan queue:listen
                        CreatePreviewJob::dispatch($previewService);
                    }
                }
                $content->update(['confirm'=>1]);
            }
            $content->update([ 'published'=> (int)($actualContentsInfo[$content->id]['published'])]);

        }
        return $this;
    }
    public function update( ContentFileInfoStructure $contentInfo):bool{



        $actualContentsInfo = array_combine(array_column($actualContentsInfo, 'id'), $actualContentsInfo);

        $contentsForPreviews = ReviewContent::where('review_id', $review->id)->where('confirm', 0)->whereIn('id', array_keys($actualContentsInfo))->get();
        if($contentsForPreviews->count() === 0){
            return true;
        }
        foreach ($contentsForPreviews as $content){
            if(!$content->confirm){
                if($previewServices = $this->getPreviewServiceForContent($content)){
                    foreach ($previewServices as $previewService){
                        //dont forget to run  Supervisor  php artisan queue:listen
                        CreatePreviewJob::dispatch($previewService);
                    }
                }
                $content->update(['confirm'=>1]);
            }
            $content->update([ 'published'=> (int)($actualContentsInfo[$content->id]['published'])]);

        }
        $contents = ReviewContent::where('review_id', $review->id)->where('type', 'original')->get();
        if($contents->count() === 0){
            //todo debug it
            Storage::disk('reviewContent')->delete($review->id);
            return true;
        }

        //todo published/unpublished setting save original and previews content

        return true;
    }


    protected function contentFromArrayToStructures($contentInfoAsArray, string $contentable_type, string $contentable_id):array{
        $contentInfoStructures = [];
        if(isset($contentInfoAsArray['id']) && $contentInfoAsArray['id']){
            $contentInfo = ['contentable_type' => $contentable_type, 'contentable_id' => $contentable_id];
            $contentInfoStructures[] = $contentInfo = new ContentUpdateStructure($contentInfoAsArray + $contentInfo);
            if(!$contentInfo->contentable_id || !$contentInfo->contentable_type){
                throw  new \Exception('not set contentable_id or contentable_type');
            }
        }else{
            foreach ($contentInfoAsArray as $info){
                $contentInfo = ['contentable_type' => $contentable_type, 'contentable_id' => $contentable_id];
                $contentInfoStructures[] = $contentInfo = new ContentUpdateStructure($info + $contentInfo);
                if(!$contentInfo->contentable_id || !$contentInfo->contentable_type){
                    throw  new \Exception('not set contentable_id or contentable_type');
                }
            }
        }
        return $contentInfoStructures;
    }

    protected function getContentIds( array $contentStructures):array{
        $contentIds = [];
        foreach ($contentStructures as $structure){
            /**@var ContentUpdateStructure $structure*/
            $contentIds[] = $structure->id;
        }
        return array_unique($contentIds);
    }

    public function addPreviewService( string $type, PreviewsServiceAbstract $previewService):self    {
        $this->previewServices[$type] = $previewService->forContent(Content::class);
        return $this;
    }

}

