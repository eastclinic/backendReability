<?php

namespace Modules\Doctors\Http\Controllers\Admin;

use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\Response\ResponseService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Content\Services\ContentService;
use Modules\Content\Services\PreviewServices\ImagePreviewsService;
use Modules\Content\Services\PreviewServices\VideoPreviewsService;
use Modules\Doctors\Entities\DoctorDiplom;
use Modules\Doctors\Http\Requests\Diploms\CreateRequest;
use Modules\Doctors\Http\Requests\Diploms\UpdateRequest;
use Modules\Doctors\Http\Resources\DiplomResourse;

class DoctorDiplomResourceController extends Controller
{

//    private ApiDataTableService $QueryBuilderByRequest;
    private ContentService $contentService;

    public function __construct(
        //ReviewService $reviewService,
//        ApiDataTableService $apiHandler,//,
        ContentService $contentService
    )    {
//        $this->QueryBuilderByRequest = $apiHandler;
        $this->contentService = $this->addPreviewServiceForContent($contentService);

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('doctors::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('doctors::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateRequest $request)
    {
        $requestData = $request->validated();
        $diplom = DoctorDiplom::create($requestData);

        if($requestData['content']) {
            $this->contentService->store( $requestData['content'], DoctorDiplom::class, $diplom->id  );
        }
        return response()->ok( new DiplomResourse($diplom), ['message' => 'Diplom created'], 200 );
    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateRequest $request, $id)
    {
        $requestData = $request->validated();


        if($diplom = DoctorDiplom::where('id', $id)->first()){
            $diplom -> update($requestData);
            if($requestData['content']) {
                $this->contentService->store( $requestData['content'], DoctorDiplom::class, $id  );
            }
            return response()->ok( new DiplomResourse($diplom), ['message' => 'Diplom created'], 200 );
        }

        ResponseService::error('Do not find doctor');
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

    protected function addPreviewServiceForContent( ContentService $contentService ):ContentService{
        $contentService->addPreviewService( (new ImagePreviewsService())
            ->withKey('300x300')
            ->withExtension('webp')
            ->withSize(300, 300)) ;


        $contentService->addPreviewService( (new VideoPreviewsService())
            ->withKey('300x300')
            ->withExtension('webm')
            ->withSize(300, 300)) ;

        return $contentService;
    }


}
