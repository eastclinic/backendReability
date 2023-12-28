<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
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

    /**
     * Update content_cache column in modx db
     * @return $this
     */

    public function contentCacheUpdate():self    {
        $contentCache = [];
        //always load content relation with order by updated time
        $this->load([
            'content' => function ($query) {
                $query->where('type','!=', 'original')
                    ->orderBy('updated_at', 'desc');
            }]);
        //if cleared content
        if( !$this->content) {
            $this->content_cache = json_encode($contentCache);
            $this->save();
            return $this;
        }

        foreach ($this->content as $content){
            //fill legacy
            $contentLegacy = [
                "id" => $content->id,
                "type" => $content->type,
                "typeFile" => $content->typeFile,
                "url" => $content->url,
            ];
            if($content->preview){ //add preview
                $contentLegacy['preview'] = [
                    "id" => $content->preview->id,
                    "type" => $content->preview->type,
                    "typeFile" => $content->preview->typeFile,
                    "url" => $content->preview->url,
                ];
            }
            $contentCache[] = $contentLegacy;
        }
        $this->content_cache = json_encode($contentCache);
        $this->save();
        return $this;
    }


}
