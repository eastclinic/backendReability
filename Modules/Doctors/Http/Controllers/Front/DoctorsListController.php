<?php

namespace Modules\Doctors\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiListRequest;
use App\Services\ApiRequestQueryBuilders\ApiListService;
use App\Services\Response\ResponseService;
use Modules\Doctors\Entities\Doctor;
use Modules\Doctors\Http\Resources\DoctorResource;

class DoctorsListController extends Controller
{

    private ApiListService $QueryBuilderByRequest;

    public function __construct(
        ApiListService $apiHandler//,
    )    {
        $this->QueryBuilderByRequest = $apiHandler;

    }

    /**
     * Display a listing of the resource.
     * @param ApiListRequest $request
     * @return array|string
     */
    public function index(ApiListRequest $request)
    {
        $doctors = Doctor::query()->where('off', 0);
        $doctors = $this->QueryBuilderByRequest->defaultPerPage(2000)->build( $doctors, $request );
        return ResponseService::apiCollection( DoctorResource::collection($doctors->paginate()),
            ['optionLabel' => 'fullname',
            'optionValue' => 'id'
            ]
        );
    }




}
