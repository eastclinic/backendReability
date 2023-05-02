<?php

namespace Modules\Health\Http\Controllers\Admin;

use App\Http\Requests\ApiDataTableRequest;
use App\Services\Graph\RelationGraph;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;
use Modules\Health\Http\Requests\ApiBindsRequest;
use Modules\Health\Services\ApiRequestQueryBuilders\ApiBindsService;
use Modules\Health\Services\ApiResponse\ApiBindsResponse;
use Modules\Health\Services\GraphRelations;
use Modules\Reviews\Http\Services\ReviewService;
use Modules\Health\Services\Target;

class HealthBindsController extends Controller
{
    private ApiBindsService $QueryBuilderByRequest;

    public function __construct( ApiBindsService $apiHandler )    {
        $this->QueryBuilderByRequest = $apiHandler;


    }

    /**
     * Display a listing of the resource.
     */
    public function index(ApiBindsRequest $request)
    {

        $requestData = $request->validated();

        //$this->QueryBuilderByRequest внутри себя выбирает класс который будет обрабатывать реквест, и добавлять условия к запросу
        //у $request же можно спросить какой формат ответа выбрать - какой response

        //get models and relations data
        $modelAlias = new GraphRelations();


        $baseModel = $request->getBaseModel();
//        $targetModel = $request->getTargetMethod();
        //вообще построитель запроса будет в QueryBuilderByRequest, но и здесь, или в дочерних классах можно добавить запрос
        $relationGraph = new RelationGraph();
        $queryBinds = $baseModel::query()->whereIn('id', [1])

//            ->with($targetModel)
//            ->with($targetModel.'.variations')
//            ->with('variations')
//            ->with(
//                [
//
//                    //'services'=>['variations'],
//
////                    'variations' => function ($query) {
////                $prefix = $query->getQuery()->from;
////                $query->addSelect($prefix.'.id as id')->groupBy('id');;
////            },
//                'services' => function ($query) {
////                    $prefix = $query->getQuery()->from;
//                    $primaryKey = $query->getQuery()->getModel()->getKeyName();
//                    $primaryKey = $query->getQuery()->from.'.'.$primaryKey;
//                $query->addSelect($primaryKey);//->whereIn($primaryKey, [21,24]);
//                //$query->select('id', 'service_name');
//            },
//            'services.variations' => function ($query) {
//                $primaryKey = $query->getQuery()->getModel()->getKeyName();
//                $primaryKey = $query->getQuery()->from.'.'.$primaryKey;
//                $query->addSelect($primaryKey);
//            },
//            ])

                //->with('variations.services')
//                ->groupBy('created_at')
//        ->has('variations.services')
        ;





    $response = (new ApiBindsResponse())->forRequest($request)->withBindsQuery($queryBinds)->answer();


        //есть инфа, какие сущности нужны в итоге
        //для таблицы доктора - рутовые услуги (порядок важен, так будет определятся вложенность):
//        $r = $relationGraph->withResponseModels([ Doctor::class, Service::class, Variation::class])
//            ->withModel(
//                Doctor::whereIn('id', [1, 2])->select('name')       )
//            ->groupById()
//            ->get();

        //Log::info(print_r($r,1));
        return response()->json([ 'data' => $response, 'code' => 200, 'ok' => true],200);

        if($requestData['doctorsIds']){
            $doctors = Doctor::whereIn('id', $requestData['doctorsIds'])->with('variations')->get();
        }
        if($requestData['servicesIds']){
            $services = Service::whereIn('id', $requestData['servicesIds'])->with('variations')->get();
        }
        if($requestData['seoResourcesIds']){
//            $seoResources = SeoResource::whereIn('id', $requestData['servicesIds'])->with('variations');
//            if($requestData['seoResourceType']){
//                $seoResources->where('seo_type', $requestData['seoResourceType']);
//            }
//            $seoResources->get();
        }
        if($requestData['variationsIds']){

        }


        //есть многомерный массив, в котором содержатся графы (псевдонимы моделей)
        $graphHealth = [['clinic', 'doctor'],
            [ 'seoResource', 'service', 'variation', 'doctor']
            ];


        //определяем ветки графа которые подходят для relation mirror
        //для этого обходим массив $graph и определяем ветки, в которых есть более 1 элемента из массива $models
        //отфильтровали граф, по заданным узлам - моделям
        $graph = [ 'seoResource', 'service', 'variation', 'doctor'];




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
