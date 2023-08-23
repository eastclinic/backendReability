<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\DataStructures\ContentFileInfoStructure;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\CreateReviewsPreviewsJob;
use Modules\Reviews\DataStructures\AbstractDataStructure;

class ReviewContentService
{
//    public ?ReviewContent $content = null;
//    protected string $extension;
//    protected string $folder;
//    protected string $fileName;
//    protected string $url;




    public function saveFileForContent($file, ReviewContent $content):AbstractDataStructure {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder

        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $filePath = (new ReviewContentStorage())->forContent($content)->storageFolder('original');

        Storage::disk('reviewContent')->putFileAs((new ReviewContentStorage())->forContent($content)->reviewContentFolder('original'), $file, $fileName);


        return (new ContentFileInfoStructure([
            'file' => $filePath.DIRECTORY_SEPARATOR.$fileName,
            'url' => (new ReviewContentStorage())->forContent($content)->storageUrl('original/'.$fileName),
            'file_extension' => $extension,
            'file_name' => $fileName,
            'path' => $filePath,
        ]));

        //todo run job with delay for clear not used reviews content data with files


    }


}

