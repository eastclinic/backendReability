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


        if($this->relationLoaded('services') && $this->services->isNotEmpty()){
            $outArray['services'] = ServiceResource::collection($this->services);
        }
        if($this->relationLoaded('variations') && $this->variations->isNotEmpty()){
            $outArray['variations'] = VariationResource::collection($this->variations);
        }
        if($this->relationLoaded('doctors') && $this->doctors->isNotEmpty()){
            $outArray['doctors'] = DoctorResource::collection($this->doctors);
        }

        return $outArray;
    }

}
