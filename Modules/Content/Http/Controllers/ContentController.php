<?php
/**
 * @file
 * @author Jan Doe <jandoe@example.com>
 * @version 1.0
 *
 * @section LICENSE
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * @section DESCRIPTION
 *
 * The time class represents a moment of time.
 */



namespace Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestQueryBuilders\ApiListService;
use App\Services\Response\ResponseService;
use http\Env\Response;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Modules\Content\Entities\Content;
use Modules\Content\Http\Requests\ListContentRequest;
use Modules\Content\Http\Requests\SaveContentRequest;
use Modules\Content\Http\Requests\UpdateRequest;
use Modules\Content\Transformers\ContentResource;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Reviews\Http\Requests\Admin\Reviews\StoreContentRequest;
use Modules\Reviews\Jobs\CreatePreviewJob;
use Modules\Reviews\Services\ReviewContentStorage;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Bus;
use Modules\Content\Services\ContentService;
use Modules\Reviews\Services\ReviewContentService;
use Illuminate\Http\Request;



class ContentController extends Controller
{


    private ContentService $contentService;
    private ApiListService $queryBuilderByRequest;
//
    public function __construct(    ContentService $contentService,
                                    ApiListService $apiHandler
    )    {

        $this->contentService = $contentService;
        $this->queryBuilderByRequest = $apiHandler;
    }

    /**
     * Display a listing of the resource.
     * @param  $request
     * @return array|string
     */
    public function index( ListContentRequest $request)
    {

        $content = Content::where('contentable_type', $request->targetType)
            ->where('contentable_id', $request->targetId)
            ->where('type', 'original');
        $content = $this->queryBuilderByRequest->build( $content, $request );
        return ResponseService::apiCollection( ContentResource::collection($content->paginate()) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)   {

        $filesInfo = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');
//save files
            foreach ($files as $file) {
                if(!$content = $this->contentService->saveTempFile( $file, $request->contentable_type, $request->contentable_id )){
                    return response()->error('Error save upload files');
                }
                $filesInfo[] = $content->setVisible(['id', 'url', 'typeFile', 'confirm', 'published', ])->toArray();
            }
        }
        if(!$filesInfo) {
            return response()->error('Error save upload files');
        }

        return response()->ok($filesInfo, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = ReviewContent::query()->where('id', $id);
        return ResponseService::apiCollection( ReviewContentResource::collection($reviews->paginate()) );
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
//        $requestData = $request->validated();
//        error_log('update');
//        error_log('id - ' . $id);
//        error_log(print_r($requestData, 1));
//        if(!$requestData['id']) {
//            $content = new Review($requestData);
//            $content->save();
//        }
////        $review = ReviewContent::where('id', $id)->first();
////        $review -> update($request->validated());
//        return response()->okMessage('update', 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        $this->contentService->removeContentById( $id);

        return response()->okMessage('Файл удален', 200);

    }

    public function save(SaveContentRequest $request){
        if($request->attachContent) {
            (new ContentService())->update( $request->attachContent, $request->targetType, $request->targetId);
        }

        return response()->okMessage('saved', 200);
    }

}
