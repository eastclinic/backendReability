<?php

namespace Modules\Content\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Content\Entities\Content;

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
            'url' => (empty($_SERVER['HTTPS']) ? 'http' : 'https').'://'.$_SERVER['HTTP_HOST'].$this->url,
            'title' => $this->title,
            'confirm' => (bool)$this->confirm,
            'published' => (bool)$this->published,
            'typeFile' => $this->typeFile,
             'preview' => new ContentResource($this->whenLoaded('preview')),



        ];
    }
}
