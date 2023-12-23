<?php

namespace Modules\Doctors\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Entities\Content;

class DoctorDiplom extends Model
{
    use HasFactory;
    protected $connection = DB_CONNECTION_DEFAULT;
    protected $fillable = ['title', 'doctor_id', 'published'];

//    protected $table = 'doctor_diploms';

    protected $perPage = 10;

    protected static function newFactory()
    {
        return \Modules\Doctors\Database\factories\DoctorDiplomFactory::new();
    }

    public function contentRaw(){
        return $this->morphMany(Content::class, 'contentable');
    }

    public function content(){
        return $this->contentRaw()
            ->with('preview')
            ->where('confirm', 1)
            ->where('is_preview_for', '');
    }

    public function getMorphClass()
    {
        return 'doctorDiplom';
    }

    /**
     * Get the review that owns the message.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
