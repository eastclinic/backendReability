<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
//        if(isset($this->doctors))$outArray['doctors'] = DoctorResource::collection($this->whenLoaded('doctors'));
        if(isset($this->variations))$outArray['variations'] = VariationResource::collection($this->whenLoaded('variations'));
        return $outArray;
    }
}
