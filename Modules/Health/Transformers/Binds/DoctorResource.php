<?php

namespace Modules\Health\Transformers\Binds;

use Illuminate\Http\Resources\Json\JsonResource;

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

        $outArray = parent::toArray($request);

        return $outArray;
    }
}
