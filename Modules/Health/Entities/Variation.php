<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'health_variations';
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
        return $this->belongsToMany(Doctor::class, 'health_doctor_variation');
    }

}
