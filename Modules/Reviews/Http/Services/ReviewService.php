<?php


namespace Modules\Reviews\Http\Services;
use App\Services\Response\ResponseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewContent;


class ReviewService
{
    private Review $reviewModel;
    private ReviewContent $contentModel;
    public function __construct(Review $review, ReviewContent $contentModel)    {
        $this->reviewModel = $review;
        $this->contentModel = $contentModel;
    }

    public function delete(int $id):bool {
        $review = $this->reviewModel::find($id);
        if(!$review) return  false;

        //remove bind messages
        $review->message()->delete();

        $reviewFiles = $review->content;

        //clear attach files
        if($reviewFiles){
            foreach ($reviewFiles as $fileInfo){
                Log::info( $fileInfo->file );
                if( $fileInfo->file ){
                    Storage::disk($this->contentModel::STORAGE_DISK)->delete($fileInfo->file);
                }
            }
        }
        return true;
        $review->content()->delete();

        if($review->delete()){
            return true;
        }
    }

}
