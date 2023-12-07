<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class Content extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'file',
        'url',
//        'file_extension',
//        'file_name',
        'type',
        'typeFile',
        'confirm',
        'published',
        'contentable_type',
        'contentable_id',
        'parent_id',
        'mime',
        'previews_id'
    ];


    protected static function newFactory()
    {
        return \Modules\Content\Database\factories\ContentFactory::new();
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


    public function contentable()
    {
        return $this->morphTo();
    }
    public function preview() {
        return $this->hasOne(Content::class,'preview_id');
    }

}
