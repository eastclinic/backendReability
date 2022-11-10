<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewContent extends Model
{
    use HasFactory;

    protected $table = 'reviews_content';
    protected $fillable = ['path', 'upload_name', 'url', 'converted_content_info'];

    protected static function newFactory()
    {
        return \Modules\Reviews\Database\factories\ReviewContentFactory::new();
    }

    /**
     * Get the parent contentable model (review or message).
     */
    public function contentable()
    {
        return $this->morphTo();
    }

}
