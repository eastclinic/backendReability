<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Entities\Content;
use Modules\Content\Transformers\ContentResource;
use Modules\Doctors\Database\factories\DoctorFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $connection = DB_CONNECTION_MODX;

    protected $table = 'modx_doc_doctors';
    //todo permission
    protected $fillable = ['surname', 'name', 'middlename', 'diploms_cache', 'content_cache' ];

    protected $perPage = 10;
//    protected static function newFactory()
//    {
//        return \Modules\Doctors\Database\factories\DoctorFactory::new();
//    }


    protected static function newFactory()
    {
        return DoctorFactory::new();
    }

    public function contentRaw(){
        return $this->morphMany(Content::class, 'contentable');
    }

    public function content(){
        return $this->contentRaw()
            ->with('preview')
            ->where('confirm', 1)
            ->where('is_preview_for', '');
    }


    public function diploms():HasMany   {
        return $this->hasMany(DoctorDiplom::class)->with('content');
    }
    public function getMorphClass()
    {
        return 'doctor';
    }


    public function contentCacheUpdate():self    {
        // Check if posts relation is loaded, if not, load it
        if (!$this->relationLoaded('content')) {
            $this->loadMissing('content');
        }
        if( !$this->content) return $this;

        $contentCache = [];
        foreach ($this->content as $content){
            $contentLegacy = [
                "id" => $content->id,
                "size" => $content->type,
                "type" => $content->typeFile,
                "image" => $content->url,
            ];
            if($content->preview){
                $contentLegacy['preview'] = [
                    "id" => $content->preview->id,
                    "size" => $content->preview->type,
                    "type" => $content->preview->typeFile,
                    "image" => $content->preview->url,
                ];
            }
            $contentCache[] = $contentLegacy;
        }
        $this->content_cache = json_encode($contentCache);
        $this->save();
        return $this;
    }


}
