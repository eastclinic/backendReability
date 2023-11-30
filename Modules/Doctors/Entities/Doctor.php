<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Entities\Content;
use Modules\Doctors\Database\factories\DoctorFactory;

class Doctor extends Model
{
    use HasFactory;

//    protected $connection = 'MODX';

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

    public function getMorphClass()
    {
        return 'doctor';
    }
}
