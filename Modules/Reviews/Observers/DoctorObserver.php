<?php

namespace Modules\Reviews\Observers;
use Modules\Doctors\Entities\Doctor;

class DoctorObserver
{
    /**
     * Handle the User "deleted" event.
     * @param Doctor $doctor
     */
    public function deleted(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the User "forceDeleted" event.
     * @param Doctor $doctor
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }
}
