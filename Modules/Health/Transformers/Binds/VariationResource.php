<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;

class VariationResource extends JsonResource
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
        if(isset($this->doctors))    $outArray['doctors'] = DoctorResource::collection($this->doctors)->toArray($request);
//        if(isset($this->services))      $outArray['services'] = VariationResource::collection($this->whenLoaded('services'));


        if(isset($this->custom_price)){
            $outArray['custom_price'] = (int)$this->custom_price;
        }
        return $outArray;
    }
}
