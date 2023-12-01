<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorDiplom extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected $perPage = 10;

    protected static function newFactory()
    {
        return \Modules\Doctors\Database\factories\DoctorDiplomFactory::new();
    }


}
