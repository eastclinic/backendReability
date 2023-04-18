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
        //todo handle error
        //todo !test
        $healthDoctors = HealthDoctor::where('doctor_id', $doctor->id);
        $healthDoctors->delete();


    }

    /**
     * Handle the Doctor "created" event.
     * @param Doctor $doctor
     */
    public function created(Doctor $doctor)
    {
        //todo handle error
        //todo !test
        $healthDoctor = new HealthDoctor();
        $healthDoctor->doctor_id = $doctor->id;
        $healthDoctor->save();
    }


    /**
     * Handle the User "forceDeleted" event.
     * @param Doctor $doctor
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }

    public function handle($event) {
        if(!$event->action) return true;
        switch ($event->action){
            case 'truncate':
                //truncate Doctors
                //todo handle error
                //todo !test
                HealthDoctor::truncate();
                break;
            case 'createdMass':
                //several Doctors

                if($event->doctors->count()){
                    //todo handle error
                    //todo !test
                    $event->doctors->map(function ($doctor){
//                        Log::info(print_r($doctor, 1));
                        HealthDoctor::create(['doctor_id' => $doctor->id]);
                    });
                }
                break;
            case 'deletedMass':
                if($event->doctors->count()) {
                    //todo handle error
                    //todo !test
                    HealthDoctor::whereIn('id', $event->doctors->pluck('id')->toArray())->delete();
                }
                break;
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe(Dispatcher $events): array
    {

        return [
            DoctorEvent::class => 'handle',
        ];
    }


}
