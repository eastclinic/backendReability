<?php

namespace Modules\Reviews\Observers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;

class ReviewAttachObserver
{
    /**
     * Handle the User "deleted" event.
     * @param Review $review
     */
    public function deleting(Review $review)
    {


        $reviewFiles = $review->content;

        //clear attach files
        if($reviewFiles){
            foreach ($reviewFiles as $fileInfo){
                if( $fileInfo->file ){
                    Storage::disk(config('reviews.storeDisk'))->delete($fileInfo->file);
                }
            }
        }


    }

    /**
     * Handle the User "forceDeleted" event.
     * @param Review $review
     */
    public function forceDeleted(Review $review)
    {
        //
    }
}
