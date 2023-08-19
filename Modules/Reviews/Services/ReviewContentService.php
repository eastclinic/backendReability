<?php


namespace Modules\Reviews\Services;



use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Jobs\CreateReviewsPreviewsJob;

class ReviewContentService
{


    public function saveFileForContent($file, ReviewContent $content):bool {

        //if isset id, save to folder with name id
        //if not have id, that save in zero folder
        $folder = 'upload'.DIRECTORY_SEPARATOR.'reviews'.DIRECTORY_SEPARATOR.$content->review_id;

        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        Storage::disk('reviewContent')->putFileAs($folder, $file, $fileName);
        $content->update(['file' => $folder.DIRECTORY_SEPARATOR.$fileName,
            'url' => Storage::disk('reviewContent')->url('upload/reviews/'.$content->review_id.'/'.$fileName),
            'file_extension' => $extension,
            'file_name' => $fileName,
            'path' => $folder,
        ]);

        //dont forget to run  Supervisor
        CreateReviewsPreviewsJob::dispatch($content->id);
        //todo run job with delay for clear not used reviews content data with files

        return true;

    }

}
