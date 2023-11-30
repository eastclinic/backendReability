<?php

namespace Modules\Content\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
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
            'confirm' => (bool)$this->confirm,
            'published' => (bool)$this->published,
            'typeFile' => $this->typeFile,




        ];
    }
}
