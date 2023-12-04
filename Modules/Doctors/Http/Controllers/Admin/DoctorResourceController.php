<?php

namespace Modules\Doctors\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAbstractRequest;
use App\Services\ApiRequestQueryBuilders\ApiDataTableService;
use App\Services\ApiRequestQueryBuilders\ApiRequestQueryBuilderAbstractService;
use App\Services\Response\ResponseService;


use Illuminate\Support\Facades\Log;
use Modules\Content\Services\ContentService;
use Modules\Content\Services\PreviewServices\ImagePreviewsService;
use Modules\Content\Services\PreviewServices\VideoPreviewsService;
use Modules\Doctors\Entities\Doctor;
use Modules\Doctors\Http\Requests\DoctorInfo\CreateRequest;
use Modules\Doctors\Http\Requests\DoctorInfo\UpdateRequest;
use Modules\Doctors\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\ApiDataTableRequest;

class DoctorResourceController extends Controller
{

    private ApiDataTableService $QueryBuilderByRequest;
    private ContentService $contentService;

    public function __construct(
        //ReviewService $reviewService,
        ApiDataTableService $apiHandler,//,
        ContentService $contentService
    )    {
        $this->QueryBuilderByRequest = $apiHandler;
        $this->contentService = $this->addPreviewServiceForContent($contentService);

    }

    /**
     * Display a listing of the resource.
     * @param ApiDataTableRequest $request
     * @return array|string
     */
    public function index(ApiDataTableRequest $request)
    {

        $doctors = Doctor::query();
        Log::info('ReviewResourceController index!');
        $doctors = $this->QueryBuilderByRequest->withGlobalSearchByFields([ 'surname', 'name', 'id'])->build( $doctors, $request );
        $doctors->with(['content' => function ($query) {
            $query->where('type', 'original')->where('confirm', 1);
        }]);
//        $dbconnect = DB::connection('MODX')->getPDO();
//        $dbname = DB::connection('MODX')->select('SHOW TABLES FROM east_prod');
//        dd($dbname);
        //necessarily models to collection must get with pagination data:  collection($model->paginate())
        //ReviewResource
//        return response()->apiCollection( $reviews );
        return ResponseService::apiCollection( DoctorResource::collection($doctors->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $requestData = $request->validated();
        $doctor = Doctor::create($requestData);

        if($requestData['content']) {
            $this->contentService->store( $requestData['content'], Doctor::class, $doctor->id  );
        }
        return response()->okMessage('Create new doctor', 200);
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


        if($doctor = Doctor::where('id', $id)->first()){
            $doctor -> update($requestData);
            if($requestData['content']) {
                $this->contentService->store( $requestData['content'], Doctor::class, $id  );
            }
            return response()->okMessage('Change data.', 200);
        }



        ResponseService::error('Do not find doctor');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        if($this->reviewService->delete($id)){
            return ResponseService::okMessage('Removed review');
        }else{
            return  ResponseService::error('Failed to remove review');
        }
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
