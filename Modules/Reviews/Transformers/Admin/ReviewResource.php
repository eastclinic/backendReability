<?php

namespace Modules\Reviews\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'text' => $this->text,
            'rating' => $this->rating,
            'reviewable_id' => $this->reviewable_id,
            'reviewable_type' => $this->reviewable_type,
            'author' => $this->author,
            'content' => ReviewContentResource::collection($this->whenLoaded('content'))
        ];

    }
}
