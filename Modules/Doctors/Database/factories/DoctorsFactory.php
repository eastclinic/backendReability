<?php

namespace Modules\Doctors\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Doctors\Entities\Doctor;

class DoctorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

