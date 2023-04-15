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
            'reviewable_type' => 'Modules\Doctors\Entities\Doctor',
            'reviewable_id' => $this->faker->numberBetween(1, 20),
            'text' => $this->faker->realText(),
            'rating' => $this->faker->randomElement([60, 65, 70, 75, 80, 85, 90, 95, 100, 100]),
            'published' => $this->faker->numberBetween(0,1),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')->getTimestamp(),
            'is_new' => $this->faker->numberBetween(0,1),
        ];
    }
}

