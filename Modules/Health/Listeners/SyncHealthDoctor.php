<?php

namespace Modules\Health\Listeners;

use Modules\Doctors\Events\DoctorHandle;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Health\Entities\Doctor;

class SyncHealthDoctor
{

    public $afterCommit = true;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param DoctorHandle $event
     * @return void
     */
    public function handle(DoctorHandle $event)
    {
//        $doctor = $event->doctor;

        if ($event->action == 'created') {
//            $healthDoctor = new Doctor();
//            $healthDoctor->doctor_id = $doctor->id;
//            $healthDoctor->save();
        } else if ($event->action == 'deleted') {
//            $healthDoctor = Doctor::where('doctor_id', $doctor->id)->first();
//            if ($healthDoctor) {
//                $healthDoctor->delete();
//            }
        }
    }
}
