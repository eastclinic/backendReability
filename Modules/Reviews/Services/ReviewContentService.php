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

        ClearUnconfirmedReviewContentJob::dispatch($content)->delay(now()->addSeconds(10));

        //todo create job for clear "last" content

        return (new ContentFileInfoStructure([
            'file' => $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension,
            'url' => (new ReviewContentStorage())->forContent($content)->contentUrl('original/'.$fileNameWithExtension),
            'type' => 'original'
        ]));

        //todo run job with delay for clear not used reviews content data with files


    }


    public function removeFilesForContent(ReviewContent $content):bool {
        Storage::delete($content->file);
        if(!$content->parent_content_id) return true;
        if(!$previews = ReviewContent::where('parent_content_id', $content->parent_content_id)->get())  return true;
        foreach ($previews as $preview){
            Storage::disk('reviewContent')->delete($preview->file);
        }

        return true;
    }

}

