<?php

namespace Modules\Reviews\Observers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Services\ReviewContentService;

class ReviewObserver
{
    /**
     * Handle the User "deleted" event.
     * @param Review $review
     */
    public function deleting(Review $review)
    {
        //clear attach files
        if($reviewContent = $review->content){
            foreach ($reviewContent as $content){
                (new ReviewContentService())->removeContent($content);
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
