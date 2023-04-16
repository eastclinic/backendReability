<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iservice extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iid', 'price'];
    protected $table = 'health_iservices';

    protected static function newFactory()
    {
        return \Modules\Health\Database\factories\IserviceFactory::new();
    }
}
