<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\DataStructures\ContentFileInfoStructure;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\ClearUnconfirmedContentJob;
use Modules\Reviews\Jobs\CreatePreviewJob;
use Modules\Reviews\DataStructures\AbstractDataStructure;

class ReviewContentService
{

    protected ?ReviewContent $content = null;
    public function saveFileForContent($file, ReviewContent $content):AbstractDataStructure {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder

        $extension = mb_strtolower($file->getClientOriginalExtension());
        $fileName = uniqid();
        $fileNameWithExtension = $fileName.'.'.$extension;
        $filePath = (new ReviewContentStorage())->forContent($content)->contentFolder('original');

        Storage::disk('reviewContent')->putFileAs($filePath, $file, $fileNameWithExtension);

        //create job for clear "forget" content
        ClearUnconfirmedContentJob::dispatch($this->forContent($content))->delay(now()->addHours(2));

        //return data structure for save in db
        return (new ContentFileInfoStructure([
            'file' => $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension,
            'url' => (new ReviewContentStorage())->forContent($content)->contentUrl('original/'.$fileNameWithExtension),
            'type' => 'original'
        ]));

        //todo run job with delay for clear not used reviews content data with files


    }


    public function removeContent(ReviewContent $content):bool {

        //if content already remove return
        if(!$nowContent = ReviewContent::where('id', $content->id)->first())return true;
        //clear original file

        Storage::disk('reviewContent')->delete($nowContent->file);
        //clear previews files
        (new ContentPreviewService($nowContent))->removePreviews();
        $nowContent->delete();

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


    public function confirmContentForReview(array $actualContentIds, Review $review):bool{

        $actualContentIds = array_combine($actualContentIds, $actualContentIds);
        if(!$contents = ReviewContent::where('review_id', $review->id)->where('type', 'original')->get())return true;
        foreach ($contents as $content){
            if(isset($actualContentIds[$content->id])){
                if(!$content->confirm){
                    //preview here
                    //dont forget to run  Supervisor  php artisan queue:listen
                    CreatePreviewJob::dispatch(new ContentPreviewService($content));
                    $content->update(['confirm'=>1]);
                }
            }else {
                $this->removeContent($content);
            }
        }
        return true;
    }


}

