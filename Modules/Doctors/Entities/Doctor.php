<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Log;
use Modules\Doctors\Database\factories\DoctorFactory;
use Modules\Doctors\Events\DoctorEvent;
use Modules\Health\Entities\Doctor as HealthDoctor;



class Doctor extends Model
{
    use HasFactory;

//    protected $connection = 'MODX';

    protected $table = 'modx_doc_doctors';
    //todo permission
    protected $fillable = ['fullname'];

//    protected static function newFactory()
//    {
//        return \Modules\Doctors\Database\factories\DoctorFactory::new();
//    }

//    public function healthData(): HasOne
//    {
//        return $this->hasOne(HealthDoctor::class);
//    }


    protected static function newFactory()
    {
        return DoctorFactory::new();
    }




}
