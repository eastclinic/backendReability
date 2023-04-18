<?php

namespace Modules\Health\Http\Controllers\Admin;

use App\Http\Requests\ApiDataTableRequest;
use App\Services\ApiRequestQueryBuilders\ApiBindsService;
use App\Services\Response\ResponseService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Health\Entities\Service;
use Modules\Health\Transformers\ServiceResource;


class ServiceResourceController extends Controller
{

    private ApiBindsService $QueryBuilderByRequest;

    public function __construct(ApiBindsService $apiHandler)    {
        $this->QueryBuilderByRequest = $apiHandler;
    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {

        $services = Service::query();

        //Log::info('ReviewResourceController index!');
        $services = $this->QueryBuilderByRequest->build( $services, $request );

        //necessarily models to collection must get with pagination data:  collection($model->paginate())

        return ResponseService::apiCollection( ServiceResource::collection($services->paginate()) );
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('health::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('health::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('health::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
