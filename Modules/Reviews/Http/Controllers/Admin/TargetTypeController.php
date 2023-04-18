<?php

namespace Modules\Reviews\Http\Controllers\Admin;

use App\Services\ApiRequestQueryBuilders\ApiBindsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reviews\Http\Services\Target;

class TargetTypeController extends Controller
{
    private Target $targetModel;
    public function __construct(ApiBindsService $apiHandler, Target $targetEntity)    {
        $this->targetModel = $targetEntity;
    }

    /**
     * Display a listing of the targetTypes.
     * @return Response
     */
    public function index() {

        $target = $this->targetModel->getNameList();

        return response()->ok($target);
    }

}
