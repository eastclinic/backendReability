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
use Illuminate\Support\Facades\Log;
use Modules\Content\Entities\Content;
use Modules\Content\Http\Requests\ListContentRequest;
use Modules\Content\Http\Requests\SaveContentRequest;
use Modules\Content\Http\Requests\UpdateRequest;
use Modules\Content\Transformers\ContentResource;
use Modules\Reviews\Entities\ReviewContent;
use Modules\Content\Http\Requests\StoreContentRequest;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Modules\Content\Services\ContentService;



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
        try {
            if (!$request->hasFile('files')) {
                return response()->error('Not have upload files'); //<<<<<<<<<<<<<<<<<
            }
            $filesInfo = $this->contentService->saveTempFiles($request);

            if(!$contentIds = array_column($filesInfo, 'id')){
                return response()->error('Error save upload files');
            }
            $contentCollection = Content::whereIN('id', $contentIds);
            return ResponseService::apiCollection( ContentResource::collection($contentCollection->paginate()) );

        }catch ( \Exception $e){
            return response()->error($e->getMessage());
        }
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
        $content = Content::where('id', $id)->firstOrFail();
        $this->contentService->store($request->validated(), $content->targetClass, $content->contentable_id);
        return response()->okMessage('Content update', 200);
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

        $this->contentService->update( $request->attachContent, $request->targetType, $request->targetId);

        return response()->okMessage('saved', 200);
    }

}
