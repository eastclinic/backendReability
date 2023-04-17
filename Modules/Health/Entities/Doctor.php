<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model

{
    protected $connection = 'sqlite';

    protected $table = 'health_doctors';
    //todo permission
    protected $fillable = ['doctor_id'];
    //todo Need duplicate doctor_id to table health_doctor and sync data between doctors table



    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }

}
