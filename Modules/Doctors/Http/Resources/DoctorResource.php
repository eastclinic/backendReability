<?php

namespace Modules\Doctors\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Content\Transformers\ContentResource;

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
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'middlename' => $this->middlename,
            'fullname' => $this->surname.' '.$this->name.' '.$this->middlename,
            'content' => ContentResource::collection($this->whenLoaded('content')),
            'diploms' => DiplomResource::collection($this->whenLoaded('diploms')),
        ];

    }
}
