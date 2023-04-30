<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;

class DoctorResource extends BindsItemResource
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
        if(isset($this->services)){
            $outArray['services'] = ServiceResource::collection($this->whenLoaded('services'));
        }
        if(isset($this->variations)){
            $outArray['variations'] = VariationResource::collection($this->whenLoaded('variations'));
        }


        return parent::toArray($request);
    }
}