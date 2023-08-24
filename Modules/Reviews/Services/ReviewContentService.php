<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\DataStructures\ContentFileInfoStructure;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\ClearUnconfirmedReviewContentJob;
use Modules\Reviews\Jobs\CreateReviewsPreviewsJob;
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

        //dont forget to run  Supervisor  php artisan queue:listen
        CreateReviewsPreviewsJob::dispatch(new ContentPreviewService($content));

        ClearUnconfirmedReviewContentJob::dispatch($this->forContent($content))->delay(now()->addHours(2));

        //todo create job for clear "last" content

        return (new ContentFileInfoStructure([
            'file' => $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension,
            'url' => (new ReviewContentStorage())->forContent($content)->contentUrl('original/'.$fileNameWithExtension),
            'type' => 'original'
        ]));

        //todo run job with delay for clear not used reviews content data with files


    }


    public function removeContent(ReviewContent $content):bool {

        //if content already remove return
        if(!$nowContent = ReviewContent::where('id', $content->id)->where('confirm', 0)->first())return true;
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

}

