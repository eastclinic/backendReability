<?php

namespace Modules\Health\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Doctors\Entities\Doctor as DoctorInfo;

class Doctor extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

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

    public function services()
    {
        return $this->hasManyDeep(Service::class, ['health_doctor_variation', Variation::class, 'health_service_variation']);
    }
    public function info(): HasOne{

        return $this->hasOne(DoctorInfo::class);
    }


}
