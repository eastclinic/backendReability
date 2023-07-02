<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;

class VariationResource extends BindsItemResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $outArray = parent::toArray($request);

        if(isset($this->custom_price)){
            $outArray['custom_price'] = (int)$this->custom_price;
        }
        if(isset($this->useBySkill)){
            $outArray['useBySkill'] = $this->useBySkill;
        }
        return $outArray;
    }
}
