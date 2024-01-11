<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\Content\Entities\Content;
use Modules\Content\Services\ContentLegacyCacheService;
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
            ->where('is_preview_for', '')
            ->where('type', '!=', 'original');
    }

    public function contentOriginal(){
        return $this->contentRaw()
            ->with('preview')
            ->where('confirm', 1)
            ->where('is_preview_for', '')
            ->where('type', 'original');
    }


    public function diploms():HasMany   {
        return $this->hasMany(DoctorDiplom::class)->with('content');
    }
    public function diplomsOriginal():HasMany   {
        return $this->hasMany(DoctorDiplom::class)->with('contentOriginal');
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
        $this->load([ 'content', 'diploms', ]);

        $this->content_cache = json_encode((new ContentLegacyCacheService())->forContent($this->content)->getLegacyContentData());
        $diploms = [];
        if($this->diploms){
//            $diploms = $this->diploms->toArray();
            foreach ($this->diploms as $diplom){
                if($diplom->content){
                    $diploms[$diplom->id] = $diplom->setVisible(['id', 'title', 'published'])->toArray();
                    $diploms[$diplom->id]['content'] = (new ContentLegacyCacheService())->forContent($diplom->content)->getLegacyContentData();

                }
            }
        }
        $this->diploms_cache = json_encode(array_values($diploms));


        $this->save();
        return $this;
    }


}
