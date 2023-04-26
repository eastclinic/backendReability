<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'health_variations';
    public const RELATIONS_METHODS = [Doctor::class=> 'doctors', Service::class => 'services'];
    public const MODEL_RELATION_ALIAS = 'variations';

    protected static function newFactory()
    {
        return \Modules\Health\Database\factories\VariationFactory::new();
    }

    public function iservice()
    {
        return $this->belongsTo(Iservice::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'health_doctor_variation')->withPivot(['custom_price']);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'health_service_variation');
    }

}
