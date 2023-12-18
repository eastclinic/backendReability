<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\Response\ResponseService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Content\Services\ContentConverters\ImageContentConverter;
use Modules\Content\Services\ContentConverters\VideoContentConverter;
use Modules\Reviews\Entities\Review;
use Illuminate\Database\Eloquent\Relations\Relation;
//use Modules\Reviews\Http\Requests\Admin\IndexRequest;
use App\Http\Requests\ApiDataTableRequest;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Http\Requests\Admin\Reviews\StoreRequest;
use Modules\Reviews\Http\Requests\Admin\Reviews\UpdateRequest;
use Modules\Reviews\Http\Resources\ReviewResource;
use Modules\Reviews\Http\Services\ReviewService;
use Modules\Reviews\Http\Services\Target;
use Illuminate\Support\Facades\Response;
use Modules\Content\Services\ContentService;

class ReviewResourceController extends Controller
{

    private ApiDataTableService $QueryBuilderByRequest;
    private Target $targetModel;
    private ReviewService $reviewService;
    private ContentService $contentService;

    public function __construct(
        ReviewService $reviewService,
        ApiDataTableService $apiHandler,
        Target $targetEntity,
        ContentService $contentService)    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->targetModel = $targetEntity;
        $contentService = $this->addPreviewServiceForContent($contentService);
        $this->contentService = $contentService;
        $this->reviewService = $reviewService;


    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {
//      $reviews = Review::where('id', '>', 10); // another init query
        $reviews = Review::query();

        //Log::info('ReviewResourceController index!');
        $reviews = $this->QueryBuilderByRequest->build( $reviews, $request );
//        $reviews->with('content')->with('messages');
        $reviews->with(['content' => function ($query) {
            $query->where('type', 'original')->where('confirm', 1);
        }])->with('messages');

        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        return ResponseService::apiCollection( ReviewResource::collection($reviews->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $requestData = $request->validated();

        $review = new Review($requestData);
        $target = $this->targetModel->getModel($requestData['reviewable_type']);
        if( !$target || !$target->where('id',  $requestData['reviewable_id']) -> first()){
            return response()->error('Не задано, на кого отзыв.', 400);
        }else{
           // Log::info(print_r(phpinfo(),1));
            //todo check why not work associate
            //$review->reviewable()->associate($target);
        }
        $review->save();
        //handle content
        if($requestData['content']) {

            $this->contentService->store( $requestData['content'],Review::class, $review->id  );
        }

        return response()->okMessage('Save new review.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = Review::query()->where('id', $id);
        $reviews->with(['content' => function ($query) {
            $query->where('type', 'original')->where('confirm', 1);
        }])->with('messages');
        return ResponseService::apiCollection( ReviewResource::collection($reviews->paginate()) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $requestData = $request->validated();


        $target = $this->targetModel->getModel($requestData['reviewable_type']);
        if( !$target || !$targetModel = $target->where('id',  $requestData['reviewable_id']) -> first()){
            return response()->error('Не задано, на кого отзыв.', 400);
        }else{
            // Log::info(print_r(phpinfo(),1));
            //todo check why not work associate
            //$review->reviewable()->associate($target);
        }
        if(!$review = Review::where('id', $id)->first()) return response()->error('Не найден отзыв.', 400);
        $review -> update($requestData);
        //handle content
        if($requestData['content']) {
            $this->contentService->update( $requestData['content'], Review::class, $id );
        }


        return response()->okMessage('Change data.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $review = Review::find($id);
        if(!$review) return  ResponseService::error('Failed to remove review');

        //remove bind messages
        //$review->message()->delete();
        if($review->delete()){
            return ResponseService::okMessage('Removed review');
        }else return  ResponseService::error('Failed to remove review');



    }


    public function reviewableType() {
        $accessList = ['doctorReview' => ['id' => 'doctorReview', 'text' => 'Доктор']];
        //return array_values(array_intersect_key( $accessList, Relation::$morphMap ));

        return response()->json([ 'data' => array_values(array_intersect_key( $accessList, Relation::$morphMap )), 'code' => 200, 'ok' => true],200);

    }



    private function getReviewableType($requestType){

    }


    protected function addPreviewServiceForContent( ContentService $contentService ):ContentService{
        $contentService->addContentConverter( (new ImageContentConverter())
            ->withKey('300x300')
            ->withExtension('webp')
            ->withSize(300, 300)) ;


        $contentService->addContentConverter( (new VideoContentConverter())
            ->withKey('300x300')
            ->withExtension('webm')
            ->withSize(300, 300)) ;

        return $contentService;
    }

}
