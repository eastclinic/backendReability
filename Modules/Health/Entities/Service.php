<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'health_services';
    protected static function newFactory()
    {
        return \Modules\Health\Database\factories\ServiceFactory::new();
    }
}
