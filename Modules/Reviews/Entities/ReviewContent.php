<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReviewContent extends Model
{
    use HasFactory;

    protected $table = 'reviews_content';
    protected $fillable = ['path', 'upload_name', 'url', 'converted_content_info'];
    public const STORAGE_DISK = 'reviewContent';

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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {

        static::deleted(function ($content) {
            Log::info('review content deleting!');
            //Storage::disk(self::STORAGE_DISK)->delete($content->file);
        });
    }

}
