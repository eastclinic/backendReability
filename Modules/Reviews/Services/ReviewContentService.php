<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\DataStructures\ContentFileInfoStructure;
use Modules\Reviews\Entities\ReviewContent;
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
        $filePath = (new ReviewContentStorage())->forContent($content)->storageFolder('original');

        Storage::disk('reviewContent')->putFileAs((new ReviewContentStorage())->forContent($content)->reviewContentFolder('original'), $file, $fileNameWithExtension);

        //dont forget to run  Supervisor  php artisan queue:listen
        CreateReviewsPreviewsJob::dispatch((new ContentPreviewService($content))->generate());

        //todo create job for clear "last" content

        return (new ContentFileInfoStructure([
            'file' => $filePath.DIRECTORY_SEPARATOR.$fileNameWithExtension,
            'url' => (new ReviewContentStorage())->forContent($content)->storageUrl('original/'.$fileNameWithExtension),
            'path' => $filePath,
            'type' => 'original'
        ]));

        //todo run job with delay for clear not used reviews content data with files


    }


    public function removeFilesForContent(ReviewContent $content):bool {
        Storage::delete($content->file);
        if(!$content->parent_content_id) return true;
        if(!$previews = ReviewContent::where('parent_content_id', $content->parent_content_id)->get())  return true;
        foreach ($previews as $preview){
            Storage::delete($preview->file);
        }

        return true;
    }

}

