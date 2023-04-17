<?php

namespace Modules\Health\Observers;
use Illuminate\Support\Facades\Log;
use Modules\Doctors\Entities\Doctor;
use Modules\Doctors\Events\DoctorEvent;
use Modules\Health\Entities\Doctor as HealthDoctor;
use Illuminate\Events\Dispatcher;

class DoctorObserver
{
    /**
     * Handle the User "deleted" event.
     * @param Doctor $doctor
     */
    public function deleted(Doctor $doctor)
    {
//        $healthDoctors = HealthDoctor::where('doctor_id', $doctor->id);
//        //Log::info(print_r($healthDoctors, 1));
//        $healthDoctors->delete();


    }

    /**
     * Handle the Doctor "created" event.
     * @param Doctor $doctor
     */
    public function created(Doctor $doctor)
    {

//        $healthDoctor = new HealthDoctor();
//        $healthDoctor->doctor_id = $doctor->id;
//        //Log::info(print_r($doctor->id, 1));
//        $healthDoctor->save();
    }


    /**
     * Handle the User "forceDeleted" event.
     * @param Doctor $doctor
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }

    /**
     * Обработать событие входа пользователя в систему.
     */
    public function handle($event) {


        if ($event->action == 'createdMass') {
            Log::info(print_r('createdMass', 1));
            Log::info(print_r($event, 1));
        }
        else if ($event->action == 'created') {
            Log::info(print_r('created', 1));
        }else if ($event->action == 'deletingMass') {
            Log::info(print_r('deletingMass', 1));
            //Log::info(print_r($event->doctors, 1));
        }else{
            //Log::info(print_r($event, 1));
        }


    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe(Dispatcher $events): array
    {Log::info(print_r('subscribe', 1));

        return [
            DoctorEvent::class => 'handle',
        ];
    }
}
