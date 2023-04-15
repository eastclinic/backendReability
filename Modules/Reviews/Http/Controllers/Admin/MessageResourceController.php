<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Http\Requests\ApiDataTableRequest;
use App\Http\Resources\ApiCollectionResource;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewMessage;
use Modules\Reviews\Http\Requests\Admin\Messages\StoreRequest;
use Modules\Reviews\Http\Requests\Admin\Messages\UpdateRequest;
use Modules\Reviews\Http\Services\Target;

class MessageResourceController extends Controller
{

    private ApiDataTableService $QueryBuilderByRequest;
    private Target $targetModel;

    public function __construct(ApiDataTableService $apiHandler, Target $targetEntity)    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->targetModel = $targetEntity;
    }

    /**
     * Display a listing of the resource.
     * @param int $review_id
     * @param ApiDataTableRequest $request
     */
    public function index(int $review_id, ApiDataTableRequest $request)
    {
//        return $review_id;
        $messages = ReviewMessage::query();

        $messages = $this->QueryBuilderByRequest->build( $messages, $request );
        $messages->where('review_id', $review_id);

        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
        return response()->apiCollection( $messages );
    }

    /**
     * Store a newly created resource in storage.
     * @param int $review_id
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $review_id, StoreRequest $request)
    {
        $requestData = $request->validated();
        $message = new ReviewMessage($requestData + ['review_id' => $review_id]);
        if(!Review::where('id', $review_id)->first()){
            return response()->error('Not found target review', 400);
        }

        $message->save();

        return response()->okMessage('Save new message.', 200);
    }

    /**
     * Show the specified resource.
     * @param  int  $review_id
     * @param  int  $id
     * @return
     */
    public function show(int $review_id, int $id)
    {
        return  response()->ok(ReviewMessage::where('review_id', $review_id)->where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $review_id
     * @param  UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $review_id, UpdateRequest $request, $id)
    {
        $message = ReviewMessage::where('review_id', $review_id)->where('id', $id)->first();
        $message -> update($request->validated());
        return response()->okMessage('Change data.', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $review_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $review_id, int $id) {
        $message = ReviewMessage::where('review_id', $review_id)->find($id);
        if($message && $message->delete()){
            return response()->okMessage('Removed message of review');
        }else{
            return  response()->error('not found review message', 404);
        }
    }
}
