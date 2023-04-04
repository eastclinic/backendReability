<?php

namespace Modules\Doctors\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\Response\ResponseService;


use Illuminate\Support\Facades\Log;
use Modules\Doctors\Entities\Doctor;
use Modules\Doctors\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\ApiDataTableRequest;

class DoctorResourceController extends Controller
{

    private ApiDataTableService $QueryBuilderByRequest;
//    private Target $targetModel;
//    private ReviewService $reviewService;

    public function __construct(
        //ReviewService $reviewService,
        ApiDataTableService $apiHandler//,
        //Target $targetEntity
    )    {
        $this->QueryBuilderByRequest = $apiHandler;
//        $this->targetModel = $targetEntity;
//        $this->reviewService = $reviewService;

    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {

        //$doctors = Doctor::query();
        Log::info('ReviewResourceController index!');
        //$doctors = $this->QueryBuilderByRequest->build( $doctors, $request );
//        $doctors->with('content')->with('messages');
        $dbconnect = DB::connection('MODX')->getPDO();
        $dbname = DB::connection('MODX')->select('SHOW TABLES FROM east_prod');
        dd($dbname);
        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
//        return response()->apiCollection( $reviews );
        return ResponseService::apiCollection( DoctorResource::collection($doctors->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return response()->okMessage('Save new review.', 200);
        $requestData = $request->validated();
        $review = new Review($requestData);
        $target = $this->targetModel->getModel($requestData['reviewable_type']);
        if( $target && $target->where('id',  $requestData['reviewable_id']) -> first()){
            $review->reviewable()->associate($target);
        }else{
            return response()->error('Не задано, на кого отзыв.', 400);
        }
        $review->save();

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
        //
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
        return response()->okMessage('Save new review.', 200);
        $review = Review::where('id', $id)->first();
        $review -> update($request->validated());
        return response()->okMessage('Change data.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return response()->okMessage('Save new review.', 200);
        if($this->reviewService->delete($id)){
            return ResponseService::okMessage('Removed review');
        }else{
            return  ResponseService::error('Failed to remove review');
        }
    }


}
