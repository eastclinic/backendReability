<?php

namespace Modules\Reviews\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Reviews\Entities\ReviewMessage;
use Modules\Reviews\Transformers\Admin\ReviewContentResource;
use Modules\Reviews\Transformers\Admin\ReviewMessageResource;

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
            'rating' => $this->rating * 1,
            'reviewable_id' => $this->reviewable_id,
            'reviewable_type' => $this->reviewable_type,
            'author' => $this->author,
            'published' => (bool)$this->published,
            'is_new' => (bool)$this->is_new,
            'content' => ReviewContentResource::collection($this->whenLoaded('content')),
            'messages' => ReviewMessageResource::collection($this->whenLoaded('messages')),


        ];

    }
}
