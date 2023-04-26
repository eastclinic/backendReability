<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'health_services';

    public const RELATIONS_METHODS = [Variation::class=> 'variations'];
    public const MODEL_RELATION_ALIAS = 'services';

    protected static function newFactory()
    {
        return \Modules\Health\Database\factories\ServiceFactory::new();
    }


    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class, 'health_service_variation');
    }

}
