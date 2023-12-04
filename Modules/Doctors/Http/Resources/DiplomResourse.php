<?php

namespace Modules\Doctors\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Content\Transformers\ContentResource;

class DiplomResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->surname,
            'content' => ContentResource::collection($this->whenLoaded('content')),
        ];
    }
}
