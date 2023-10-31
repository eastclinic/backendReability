<?php


namespace Modules\Content\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\DataStructures\ContentFileInfoStructure;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\ClearUnconfirmedContentJob;
use Modules\Reviews\Jobs\CreatePreviewJob;
use App\DataStructures\AbstractDataStructure;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ContentService
{

    //сохраняем временный файл
    //запускаем крон который через время удалит этот файл из временных, если он есть
    //когда от фронта приходит подтверждение на файл, переносим его в папку date('Y-m-d');
    //там где вызывается (в контроллере к примеру), настраиваем превью сервисы и передаем в крон



    protected ?ReviewContent $content = null;
    public function saveTempFile( $fileBlob ):?AbstractDataStructure {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder

        $extension = mb_strtolower($fileBlob->getClientOriginalExtension());
        $fileName = uniqid();
        $fileNameWithExtension = $fileName.'.'.$extension;
        if(!$fileType = $this->getFileType($fileBlob)) return null;
        $filePath =  date('Y-m-d');
        Storage::disk('content')->putFileAs($filePath, $fileBlob, $fileNameWithExtension);
        $file = $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension;

        //create job for clear "forget" content
        ClearUnconfirmedContentJob::dispatch($file)->delay(now()->addHours(2));

        //return data structure for save in db
        return (new ContentFileInfoStructure([
            'file' => $file,
            'url' => Storage::disk('content')->url($filePath),
            'type' => 'original',
            'typeFile' => $fileType
        ]));
    }


    public function removeContent(ReviewContent $content):bool {

        //if content already remove return
        //if(!$nowContent = ReviewContent::where('id', $content->id)->first())return true;
        //clear original file

        Storage::disk('reviewContent')->delete($content->file);
        //clear previews files
        if($previewService = $this->getPreviewServiceForContent($content)){
            $previewService->removePreviews();
        }

        if($nowContent = ReviewContent::where('id', $content->id)->first()){
            $nowContent->delete();
        }

        //check count files, if zero then remove folder
        $filePath = (new ReviewContentStorage())->forContent($content)->storageFolder('original');

        if((new \GlobIterator($filePath.'/*.*'))->count() === 0){
            Storage::disk('reviewContent')->deleteDirectory((new ReviewContentStorage())->forContent($content)->contentFolder());
        }



        return true;
    }

    public function remove():bool{
        if(!$this->content) new \Exception('Not set content');
        return $this->removeContent($this->content);
    }

    public function forContent(ReviewContent $content):self {
        $this->content = $content;
        return $this;
    }


    public function updateContentForReview(array $actualContent, Review $review):bool{

        //handle content with temp review id
        $contentIds = array_column($actualContent, 'id');
        $this->saveTemporallyContentForReview($contentIds, $review);


        $actualContent = array_combine($contentIds, $actualContent);
        $contents = ReviewContent::where('review_id', $review->id)->where('type', 'original')->get();
//        if($contents->count() === 0){
//            return true;
//        }
        foreach ($contents as $content){
            if(isset($actualContent[$content->id])){
                if(!$content->confirm){
                    if($previewService = $this->getPreviewServiceForContent($content)){
                        //dont forget to run  Supervisor  php artisan queue:listen
                        CreatePreviewJob::dispatch($previewService);
                    }
                    $content->update(['confirm'=>1]);
                }
                $content->update([ 'published'=> $actualContent[$content->id]['published']]);
            }else {
                $this->removeContent($content);
            }
        }
        $contents = ReviewContent::where('review_id', $review->id)->where('type', 'original')->get();
        if($contents->count() === 0){
            //todo debug it
            Storage::disk('reviewContent')->delete($review->id);
            return true;
        }
        return true;
    }

    protected function saveTemporallyContentForReview(array $contentIds, Review $review ){
        if( $temporalContents = ReviewContent::whereIn('id', $contentIds)->where('review_id','!=',  $review->id)->where('type', 'original')->get()){
            foreach ($temporalContents as $content){
                if( $content->review_id !== $review->id ){
                    //change folder to review id
                    Storage::disk('reviewContent')->move($content->review_id, $review->id);
                    //change review id to content
                    $content->update(['review_id' =>  $review->id,
                        'confirm'=>1,
                        'file' => str_replace($content->review_id, $review->id, $content->file),
                        'url' => str_replace($content->review_id, $review->id, $content->url),
                    ]);
                }
            }
        }

    }

    protected function getFileType($file):?string {
        if(!$fileMime = $file->getMimeType()) return null;
        if(!$fileMime = explode('/', $fileMime))return null;
        return $fileMime[0];
    }

    protected function getPreviewServiceForContent(ReviewContent $content):?PreviewsServiceAbstract {
        $fileInfo= pathinfo($content->file);
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        switch ($originalFileExtension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
                return new ImagePreviewsService($content);
            case 'mp4':
                return new VideoPreviewsService($content);
        }
        return null;

    }
}

