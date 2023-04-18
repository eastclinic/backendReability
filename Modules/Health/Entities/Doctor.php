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



    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class, 'health_doctor_variation');
    }

}
