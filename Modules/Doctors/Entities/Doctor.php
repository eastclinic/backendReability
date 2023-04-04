<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Doctors\Database\factories\DoctorFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $connection = 'MODX';

    protected $table = 'modx_doc_doctors';

    protected $fillable = ['fullname'];

//    protected static function newFactory()
//    {
//        return \Modules\Doctors\Database\factories\DoctorFactory::new();
//    }


    protected static function newFactory()
    {
        return DoctorFactory::new();
    }

}
