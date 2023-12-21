<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Entities\Content;
use Modules\Doctors\Database\factories\DoctorFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $connection = DB_CONNECTION_MODX;

    protected $table = 'modx_doc_doctors';
    //todo permission
    protected $fillable = ['surname', 'name', 'middlename', ];

    protected $perPage = 10;
//    protected static function newFactory()
//    {
//        return \Modules\Doctors\Database\factories\DoctorFactory::new();
//    }


    protected static function newFactory()
    {
        return DoctorFactory::new();
    }



    public function content(){
        return $this->morphMany(Content::class, 'contentable');
    }


    public function diploms():HasMany   {
        return $this->hasMany(DoctorDiplom::class);
    }
    public function getMorphClass()
    {
        return 'doctor';
    }
}
