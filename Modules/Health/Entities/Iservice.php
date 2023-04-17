<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Iservice extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iid', 'price'];
    protected $table = 'health_iservices';

    protected static function newFactory()
    {
        return \Modules\Health\Database\factories\IserviceFactory::new();
    }

    /**
     * Get the comments for the blog post.
     */
    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }
}
