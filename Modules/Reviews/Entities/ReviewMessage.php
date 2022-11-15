<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'parent_id',
        'message',
        'author_id',
        'author'
    ];

    protected static function newFactory()
    {
        return \Modules\Reviews\Database\factories\ReviewMessageFactory::new();
    }

    public function content(){
        return $this->morphMany(ReviewContent::class, 'contentable');
    }

    /**
     * Get the review that owns the message.
     */
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    /**
     * set alias where required. For example ReviewContent morph
     * @return string
     */
    public function getMorphClass()
    {
        return 'reviewMessage';
    }
}
