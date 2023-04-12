<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;
use Modules\Reviews\Database\factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [  'author', 'author_id', 'text', 'contact', 'reviewable_type', 'reviewable_id', 'rating', 'published' ];

    protected static function newFactory()
    {
        return ReviewFactory::new();
    }

    protected $perPage = 10;


    public function reviewable()
    {
        return $this->morphTo();
    }

    public function content(){
        return $this->morphMany(ReviewContent::class, 'contentable');
    }

    public function messages():HasMany{
        return $this->hasMany(ReviewMessage::class);
    }

    public function getMorphClass()
    {
        return 'review';
    }


// this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

//        static::deleting(function($review) {
//            $content = $review->content();
//            $content = ReviewContent::where('')->content();
//            if($content){
//                foreach ($content as $item) $item->delete();
//            }
//            Log::inreview_messagesfo('review deleting!');
//            // do the rest of the cleanup...
//        });
    }


}
