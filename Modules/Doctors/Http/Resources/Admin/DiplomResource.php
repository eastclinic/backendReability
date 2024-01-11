<?php

namespace Modules\Doctors\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Content\Transformers\ContentResource;

class DiplomResource extends JsonResource
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
            'title' => $this->title,
            'published' => (int)$this->published,
            'contentOriginal' => ContentResource::collection($this->whenLoaded('contentOriginal')),
        ];
    }
}
