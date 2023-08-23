<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class ReviewContent extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'reviews_content';
    protected $fillable = ['file',
        'url',
        'file_extension',
        'file_name',
        'review_id',
        'message_id',
        'parent_content_id',
        'type',



//        'contentable_id',
//    'contentable_type',
    ];
    public const STORAGE_DISK = 'reviewContent';

    protected static function newFactory()
    {
        return \Modules\Reviews\Database\factories\ReviewContentFactory::new();
    }

//    /**
//     * Get the parent contentable model (review or message).
//     */
//    public function contentable()
//    {
//        return $this->morphTo();
//    }

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

    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['id'];
    }

}
