<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\ClearUnconfirmedContentJob;
use Modules\Reviews\Jobs\CreatePreviewJob;

use App\DataStructures\AbstractDataStructure;
use Modules\Content\Services\ContentService;
use Modules\Content\Services\PreviewServices\ImagePreviewsService;

class ReviewContentService
{

    private ContentService $contentService;
//    public function __construct( ContentService $contentService )    {
//        $this->contentService = $contentService;
//    }
    protected ?ReviewContent $content = null;

    public function saveTempFile( $fileBlob ):?AbstractDataStructure {
        return (new ContentService())->saveTempFile( $fileBlob );
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


    public function updateContentForReview( array $actualContentsInfo, Review $review):bool{

        $this->saveTemporallyContentForReview( $review );
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

    protected function saveTemporallyContentForReview( Review $review ):self {
        if( !$contents = ReviewContent::where('review_id', $review->id)->where('confirm', 0)->get()) return $this;//<<<<<<<<<<<<<
        foreach ($contents as $content){
            if( !$fileInfo = (new ContentService())->saveTempFileForever( $content->file )) continue;
            $content->update( $fileInfo->toArray() );
        }
        return $this;
    }

    protected function getPreviewServiceForContent(ReviewContent $content):?array {
        $fileInfo= pathinfo($content->file);
        $originalFileExtension = mb_strtolower($fileInfo['extension']);
        switch ($originalFileExtension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
            case 'webp':
                return [
                    (new ImagePreviewsService())
                    ->forFileOriginal($content->file)
                    ->forModel(new ReviewContent([
                        'review_id' => $content->review_id,
                        'message_id'=> $content->message_id,
                        'parent_content_id' => $content->id,
                        'type' => '300x300',]))
                    ->forStorage(Storage::disk('content'))
                    ->withExtension('webp')
                    ->withSize(300, 300)
                ];
            case 'mp4':
//                return [new VideoPreviewsService($content)];
                return null;
        }
        return null;

    }
}

