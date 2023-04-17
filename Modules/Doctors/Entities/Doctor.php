<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Modules\Doctors\Database\factories\DoctorFactory;
use Modules\Doctors\Events\DoctorEvent;

class Doctor extends Model
{
    use HasFactory;

    protected $connection = 'MODX';

    protected $table = 'modx_doc_doctors';
    //todo permission
    protected $fillable = ['fullname'];

//    protected static function newFactory()
//    {
//        return \Modules\Doctors\Database\factories\DoctorFactory::new();
//    }


    protected static function newFactory()
    {
        return DoctorFactory::new();
    }


    protected static function boot()
    {
        parent::boot();

//        static::created(function ($doctor) {
//            event(new DoctorEvent($doctor, 'created'));
//        });
//
//        static::deleted(function ($doctor) {
//            //event(new DoctorHandle($doctor, 'deleted'));
//        });
    }



}
