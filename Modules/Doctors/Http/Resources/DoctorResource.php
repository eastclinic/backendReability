<?php

namespace Modules\Doctors\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Reviews\Entities\ReviewMessage;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Modules\Reviews\Transformers\Admin\ReviewMessageResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
        ];

    }
}
