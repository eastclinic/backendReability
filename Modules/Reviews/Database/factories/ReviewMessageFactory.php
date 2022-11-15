<?php

namespace Modules\Reviews\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewMessage;

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

        $authorId = $this->faker->numberBetween(0,5);
        $authorName = (!$authorId) ? $this->faker->firstName() : null;
        //$parentId = (ReviewMessage::all()->count() > 0 ) ? ReviewMessage::all()->random()->id : null;

        return [
            'author' => $authorName,
            'author_id' => ($authorId) ? $authorId : null,
            'review_id' => Review::all()->random()->id,
            //'parent_id' =>  $parentId,
            'message' => $this->faker->realText(),
            'published' => $this->faker->numberBetween(0,1),
        ];
    }
}

