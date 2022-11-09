<?php

namespace Modules\Reviews\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Reviews\Entities\ReviewMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->firstName(),
            'review_id' => 'doctor',
            'parent_id' =>  $this->faker->randomElement([0, 0, 0, 0, 0, 0, 0, 0, 1]),
            'message' => $this->faker->realText(),
            'published' => $this->faker->numberBetween(0,1),
        ];
    }
}

