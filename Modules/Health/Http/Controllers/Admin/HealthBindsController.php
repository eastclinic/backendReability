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
use Modules\Health\Services\GraphRelations;

class HealthBindsController extends Controller
{
    private ApiBindsService $QueryBuilderByRequest;

    public function __construct( ApiBindsService $apiHandler )    {
        $this->QueryBuilderByRequest = $apiHandler;


    }

    /**
     * Display a listing of the resource.
     * @param ApiBindsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ApiBindsRequest $request)
    {

        $requestData = $request->validated();

        //$this->QueryBuilderByRequest внутри себя выбирает класс который будет обрабатывать реквест, и добавлять условия к запросу
        //у $request же можно спросить какой формат ответа выбрать - какой response

        //get models and relations data
        $modelAlias = new GraphRelations();


        $baseModel = $request->getBaseModel();
        //вообще построитель запроса будет в QueryBuilderByRequest, но и здесь, или в дочерних классах можно добавить запрос
        $queryBinds = $baseModel::query()->whereIn('id', [1, 2, 3, 4]);

        //attempt get special handler
        $responseHandlerClass = $this->getResponseHandlerClass($request);
        if($responseHandlerClass) {
            $response = ( new $responseHandlerClass )->forRequest($request)->withBindsQuery($queryBinds)->answer();
        }else{
            //or default response
            $response = [];
        }

        return response()->json([ 'data' => $response, 'code' => 200, 'ok' => true],200);
    }

    public function binds($baseModel, $secondModel){
        Log::info(print_r($baseModel));
        Log::info(print_r($secondModel));
        return 1;
    }



    protected function getResponseHandlerClass($request):?string {
        $baseClassName = $request->getBaseClassName();
        $targetClassName = $request->getTargetClassName();
        if(!$baseClassName || !$targetClassName) return null;
        $className = [$baseClassName, $targetClassName];
        sort($className);
        $className = 'Modules\Health\Services\ApiResponse\BindsResponses\\'.implode('', $className);
        return (class_exists($className)) ? $className : null;
    }


}
