<?php

namespace Modules\Doctors\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Log;
use Modules\Doctors\Entities\Doctor;
use Illuminate\Database\Eloquent\Collection;

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
    public function __construct()
    {
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

    public function createdMass($doctors)
    {
        $this->doctors = $doctors;
        $this->action = 'createdMass';
        return $this;
    }

    public function deletedMass($doctors)
    {
        $this->doctors = $doctors;
        $this->action = 'deletedMass';
        return $this;
    }
    public function truncate()
    {
        $this->action = 'truncate';
        return $this;
    }


}
