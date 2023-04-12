<?php

namespace Modules\Reviews\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Reviews\Entities\Review;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'author' => $this->faker->firstName(),
            'reviewable_type' => 'doctor',
            'reviewable_id' => $this->faker->numberBetween(1, 20),
            'text' => $this->faker->realText(),
            'rating' => $this->faker->randomElement([3, 3.5, 4, 4.1, 4.2, 4.5, 4.7, 4.9, 5, 5]),
            'published' => $this->faker->numberBetween(0,1),
            'is_new' => $this->faker->numberBetween(0,1),
        ];
    }
}

