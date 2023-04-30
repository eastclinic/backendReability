<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Health\Services\GraphRelations;

class BindsItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        $outArray = ['id' => $this->id,];

        if(!$relationsMethods = (new GraphRelations())->getRelationsMethods()){
            return $outArray;   //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        }
        foreach ($relationsMethods as $items){
            if(isset($this->$items) ){
                $outArray[$items] = ServiceResource::collection($this->whenLoaded($items));
            }
        }

        return $outArray;
    }
}
