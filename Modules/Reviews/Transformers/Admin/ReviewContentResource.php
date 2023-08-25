<?php

namespace Modules\Reviews\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'url' => $this->url,
            'confirm' => $this->confirm*1,
            'typeFile' => $this->typeFile,
        ];
    }
}
