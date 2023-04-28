<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{

    protected $table = 'health_doctors';
    //todo permission
    protected $fillable = ['doctor_id'];
    //todo Need duplicate doctor_id to table health_doctor and sync data between doctors table


    public const RELATIONS_METHODS = [Variation::class=> 'variations'];
    public const MODEL_RELATION_ALIAS = 'doctors';

    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class, 'health_doctor_variation')->withPivot(['custom_price']);
    }


    public function services() {
        //return $this->hasManyThrough(Service::class, Variation::class );


        return $this->hasManyThrough(
            Service::class,
            Variation::class,
            'doctor_id', // Foreign key on the variation table
            'id', // Foreign key on the service table
            'id', // Local key on the doctor table
            'service_id' // Local key on the variation table
        );

    }
}
