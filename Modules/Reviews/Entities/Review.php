<?php

namespace Modules\Reviews\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Reviews\Database\factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [  'author', 'author_id', 'text', 'contact', 'reviewable_type', 'reviewable_id', 'rating' ];

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


}
