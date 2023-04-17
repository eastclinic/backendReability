<?php

namespace Modules\Doctors\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Modules\Doctors\Entities\Doctor;

class DoctorEvent
{
    use SerializesModels, Dispatchable;
    public string $action ='';
    /**
     * @var Doctor|null
     */
    public $doctors = null;
    public string $event;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($doctors, $action)
    {
        $this->doctors = $doctors;
        $this->action = $action;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

}
