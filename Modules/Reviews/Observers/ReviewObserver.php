<?php

namespace Modules\Reviews\Observers;
use Illuminate\Support\Facades\Log;
use Modules\Reviews\Entities\Review;

class ReviewObserver
{
    /**
     * Handle the User "deleted" event.
     * @param Review $review
     */
    public function deleting(Review $review)
    {

       // Log::info(print_r($review->content(), 1));

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
