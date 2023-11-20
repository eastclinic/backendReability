<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'url',
//        'file_extension',
//        'file_name',
        'type',
        'typeFile',
        'confirm',
        'published',
    ];

    protected static function newFactory()
    {
        return \Modules\Content\Database\factories\ContentFactory::new();
    }
}
