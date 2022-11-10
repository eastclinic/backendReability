<?php

namespace Modules\Reviews\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
