<?php

namespace Modules\Reviews\Database\factories;

use Modules\Reviews\Entities\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Reviews\Entities\ReviewContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        error_log( $this->faker->image('storage', 360, 360, 'animals', true, true, 'cats'));

        return [
            'url' => $this->faker->imageUrl(),
//            'type' => 'jpg',
//            'review_id' => $this->faker->numberBetween(1, $reviews->count()),
        ];
    }
}

