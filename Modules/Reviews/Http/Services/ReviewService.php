<?php


namespace Modules\Reviews\Http\Services;
use App\Services\Response\ResponseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;
use Nwidart\Modules\Facades\Module;


class ReviewService
{
    private Review $reviewModel;
    private ReviewContent $contentModel;
    public function __construct(Review $review, ReviewContent $contentModel)    {
        $this->reviewModel = $review;
        $this->contentModel = $contentModel;
    }

    public function delete(int $id):bool {
        Log::info(print_r(config('reviews.storeDisk'), 1));
        $review = $this->reviewModel::find($id);
        if(!$review) return  false;

        //remove bind messages
        //$review->message()->delete();
        if($review->delete()){
            return true;
        }

        return true;
        $review->content()->delete();


    }

}
