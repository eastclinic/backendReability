<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends \Modules\Doctors\Entities\Doctor
{

    //todo Need duplicate doctor_id to table health_doctor and sync data between doctors table
    protected $connection = 'sqlite';


    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }

}
