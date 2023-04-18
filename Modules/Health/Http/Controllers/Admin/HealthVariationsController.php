<?php

namespace Modules\Health\Http\Controllers\Admin;

use App\Http\Requests\ApiDataTableRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Variation;
use Modules\Health\Http\Requests\ApiBindsRequest;
use Modules\Health\Services\ApiRequestQueryBuilders\ApiBindsService;
use Modules\Reviews\Http\Services\ReviewService;
use Modules\Health\Services\Target;

class HealthVariationsController extends Controller
{
    private ApiBindsService $QueryBuilderByRequest;
    private Target $targetModel;

    public function __construct(
        ApiBindsService $apiHandler,
        Target $targetEntity)    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->targetModel = $targetEntity;

    }

    /**
     * Display a listing of the resource.
     */
    public function index(ApiBindsRequest $request, $baseModel, $secondModel)
    {
        $baseCollection = $this->targetModel->getModel($baseModel);
        if( !$baseCollection ){
            return response()->error('Do not have '.$baseModel.' collection', 400);
        }

        //$doctors = Doctor::with('variations')->get();


        //Log::info('ReviewResourceController index!');
        $baseCollection = $this->QueryBuilderByRequest->build( $baseCollection, $request );
        return response()->json([ 'data' => $doctors, 'code' => 200, 'ok' => true],200);

    }

    public function binds($baseModel, $secondModel){
        Log::info(print_r($baseModel));
        Log::info(print_r($secondModel));
        return 1;
    }

//    /**
//     * Show the form for creating a new resource.
//     * @return Renderable
//     */
//    public function create($baseModel, $secondModel)
//    {
//        return view('health::create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     * @param Request $request
//     * @return Renderable
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Show the specified resource.
//     * @param int $id
//     * @return Renderable
//     */
//    public function show($id)
//    {
//        return view('health::show');
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     * @param int $id
//     * @return Renderable
//     */
//    public function edit($id)
//    {
//        return view('health::edit');
//    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param Request $request
//     * @param int $id
//     * @return Renderable
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     * @param int $id
//     * @return Renderable
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
