<?php


namespace Modules\Content\Services;



use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\DataStructures\Content\ContentFileInfoStructure;
use App\DataStructures\Content\ContentUpdateStructure;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentConverters\ImageContentConverter;
use Modules\Content\Services\ContentConverters\VideoContentConverter;
use Modules\Content\Services\ContentConverters\ContentConverterAbstract;
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
        'webp' => 'image/webp',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'mp4' => 'video/mp4',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'webm' => 'video/webm',

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
    const STORAGE_DISK = 'content';
    const IMAGE = 'image';

//с фронта приходят blob файлы - контент для отзывов (тренируемся на них)
    /**
     * с фронта приходят blob файлы - контент для отзывов (тренируемся на них)
      * в цикле
     * сохраняем сначала временный файл с методом saveTempFile(blob файл)
     * запускаем крон который через время удалит этот файл из временных, если он есть
     *
     *
     *
     * когда от фронта приходит сохранение отзыва в ReviewResourceController::store()
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
    protected ?array $contentConverters = null;
    public function saveTempFile( $fileBlob , string $contentableType, int $contentableId):?Content {

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

        $originalContent = Content::create([
            'file' => $file,
            'url' => Storage::disk('content')->url($file),
            'type' => 'original',
            'typeFile' => $fileType,
            'mime' => $this->getMime($file),
            'contentable_type' => $contentableType,
            'contentable_id' => $contentableId,

        ]);
        //create job preview for admin panel
//        CreatePreviewJob::dispatch((new ImagePreviewsService())
//            ->withKey('adminPanel')
//            ->withExtension('webp')
//            ->withSize(100, 100)
//            ->forOriginalContent($originalContent));

        return $originalContent;
    }


    public function getFileType(string $file):?string {
        if (!$fileMime = $this->getMime($file))   return null; //<<<<<<<<<<<<
        if(!$fileMime = explode('/', $fileMime))    return null; //<<<<<<<<<<<<
        return $fileMime[0];
    }

    public function getMime( string $file):?string    {
        if(!$file = explode('.', $file))    return null; //<<<<<<<<<<<<
        $ext = strtolower(array_pop($file));
        if (!$fileMime = self::MIME_TYPES[$ext])   throw new \Exception('not set mime file'); //<<<<<<<<<<<<
        return $fileMime;
    }


    public function getPath():string    {
        return '';
    }

    public function store(array $contentInfoAsArray, string $contentable_type, string $contentable_id):self    {
        if(!$contentInfoForUpdate = $this->contentFromArrayToStructures($contentInfoAsArray, $contentable_type, $contentable_id)) return $this;
        return $this->updateFromArrayStructures( $contentInfoForUpdate );
    }

    public function update(array $contentInfoAsArray, string $contentable_type, string $contentable_id):self    {

        if(!$contentInfoForUpdate = $this->contentFromArrayToStructures($contentInfoAsArray, $contentable_type, $contentable_id)) return $this;
        return $this->updateFromArrayStructures( $contentInfoForUpdate );
    }

    public function updateFromArrayStructures( array $contentInfoForUpdate ):self    {

        $contentIds = $this->getContentIds($contentInfoForUpdate);

        $originalContents = Content::where('type', 'original')
            ->whereIn('id', $contentIds)
            ->get();

        if($originalContents->count() > 0){
            foreach ($originalContents as $content){
                if(!$contentInfoFromFront = $contentInfoForUpdate[$content->id] ) continue;
                /**@var ContentUpdateStructure $contentInfoFromFront*/

                //handle generate replicas only if not confirmed original content
                if(!$content->confirm && $this->handleReplicasForOriginalContent($content)){
                    $content->update(['confirm'=>1]);
                }

                //handle remove
                if($contentInfoFromFront->isDeleted) {
                    $this->removeContentById($content->id);
                    continue;
                }

                //handle preview (for video)
                $this->handlePreviewsForContent($content, $contentInfoFromFront->preview_id);

                $updatedData = [ 'published' => $contentInfoFromFront->published,
                    'preview_id' => $contentInfoFromFront->preview_id,
                ];
                //update original file
                $content->update($updatedData);
                //update previews
                Content::where('parent_id', $content->id)->update($updatedData);


            }
        }


        return $this;
    }




    protected function handleReplicasForOriginalContent(Content $content):bool {
        if($contentConverters = $this->getConvertersByTypeFile($content->typeFile)){
            foreach ($contentConverters as $converter){
                //dont forget to run  Supervisor  php artisan queue:listen
                CreatePreviewJob::dispatch($converter->forOriginalContentId($content->id));
            }
        }
        return true;
    }

    protected function handleOriginalPreview(Model $originalContent):bool {
        $originalPreviews = Content::where('is_preview_for', $originalContent->id)->get();
        if($originalPreviews->count() === 0 && $originalContent->preview){
            throw new \Exception('not found preview');
        }

        foreach ($originalPreviews as $preview){
            if($originalContent->preview->id !== $preview->id){ //remove older preview
                $this->removeContentById($preview->id); //remove preview with child
            }
        }
        return true;
    }

    protected function handlePreviewsForContent(Model $originalContent):bool {
        //if(!$originalContent->preview) return true;

        $originalPreview = Content::where('is_preview_for', $originalContent->id)->get();
//        if( $originalContent->preview && $originalPreview && $originalContent->preview->id === $originalPreview->id) return true;


        if(!$originalContent->preview ){ //it means that clear preview
            if($originalPreview){
                $this->removeContentById($originalPreview->id); //remove preview with child
            }
            return true;
        }elseif ( $originalContent->preview ){
            $replicas = Content::where('parent_id', $originalContent->id)->with('preview')->get();


            if( $originalPreview &&  $originalContent->preview->id !== $originalPreview->id ){
                $this->removeContentById($originalPreview->id); //remove preview with child



            }
            if ($replicas->count() === 0) return true;
            foreach ($replicas as $replica) {
//                if($replica->preview)
            }

        }



        if( $originalContent->preview_id && !$originalPreviewId ){ //if remove original preview then clear previews for replicas
            $this->removeContentById( $originalContent->preview_id );
            if($replicas->count() > 0){
                foreach ($replicas as $replica){
                    $this->removeContentById($replica->preview_id);
                }
                return true;
            }
        }

        if ($replicas->count() === 0) return true;
        //if have new review id for content
        if($originalPreviewId && $originalContent->preview_id !== $originalPreviewId){
            $originalContent->update(['preview_id' => $originalPreviewId]);
            foreach ($replicas as $replica) {
                if(!$replica->typeFile || !$replica->type)  continue; //because still not run job converter for replica
                if (!$converter = $this->getConverterByTypeFileAndKey($replica->typeFile, $replica->type)) {
                    //if exists replica by not have converter for convert to this replica - its error
                    throw new \Exception('Not have preview service for ready preview');
                }
                if (!$converter->previewConverter){
                    if(!$replica->preview_id)   continue;
                    $this->removeContentById($replica->preview_id); //if change settings converters
                    continue;
                }
                if($replica->preview_id){
                    //clear old previews of replicas
                    $this->removeContentById($replica->preview_id);
                }

                CreatePreviewJob::dispatch($converter->forOriginalContentId($originalContent->id));
//                if( $replicaPreview = $this->createReplica($originalPreview, $converter)){
//                    $replica->update(['preview_id' => $replicaPreview->id]);
//                }
            }

        }

        return true;
    }


    protected function contentFromArrayToStructures($contentInfoAsArray, string $contentable_type, string $contentable_id):array{
        $contentInfoStructures = [];
        if(isset($contentInfoAsArray['id']) && $contentInfoAsArray['id']){
            $contentInfo = ['contentable_type' => $contentable_type, 'contentable_id' => $contentable_id];
            $contentInfoStructures[$contentInfoAsArray['id']] = $contentInfo = new ContentUpdateStructure($contentInfoAsArray + $contentInfo);
            if(!$contentInfo->contentable_id || !$contentInfo->contentable_type){
                throw  new \Exception('not set contentable_id or contentable_type');
            }
        }else{
            foreach ($contentInfoAsArray as $info){
                $contentInfo = ['contentable_type' => $contentable_type, 'contentable_id' => $contentable_id];
                $contentInfoStructures[$info['id']] = $contentInfo = new ContentUpdateStructure($info + $contentInfo);
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

    public function addContentConverter( ContentConverterAbstract $converter, string $originalTypeFile = '' ):self    {
        if(!$originalTypeFile) $originalTypeFile = $converter->getPossibleOriginalType();
        if(!isset($this->contentConverters[$originalTypeFile])) $this->contentConverters[$originalTypeFile] = [];
        $this->contentConverters[$originalTypeFile][] = $converter;
        return $this;
    }

    protected function getConvertersByTypeFile(string $typeFile ):?array{
        return (isset($this->contentConverters[$typeFile])) ? $this->contentConverters[$typeFile] : null;
    }

    protected function getConverterByTypeFileAndKey(string $typeFile, string $key ):?ContentConverterAbstract{
        return ( $this->contentConverters[$typeFile] && isset($this->contentConverters[$typeFile][$key])) ? $this->contentConverters[$typeFile][$key] : null;
    }

    public function diskName():string    {
        return self::STORAGE_DISK;
    }
    public function getStorageDiskNameDefault():string{
        return self::STORAGE_DISK;
    }

    public function getStorageDisk():Filesystem   {
        return $this->storageDisk();
    }

    protected function storageDisk():Filesystem {
        return Storage::disk(self::STORAGE_DISK);
    }

    public function removeContentById(string $contentId):bool {

        //if content already remove return
        //clear original file

        if (!$content = Content::find($contentId)) {
            throw new \Exception('Review not found');
        }
        $this->storageDisk()->delete($content->file);
        //clear replicas files recursive
        if($replicas = Content::where('parent_id', $contentId)->get()){
            foreach ($replicas as $replica){
                $this->removeContentById($replica->id);
            }
        }

        //remove content preview if exists
        if($previews = Content::where('is_preview_for', $contentId)->get()){
            foreach ($previews as $preview){
                $this->removeContentById($preview->id);
            }
        }

        $content->delete();
        return true;
    }

    public function destroy():self     {

        return $this;
    }



}

