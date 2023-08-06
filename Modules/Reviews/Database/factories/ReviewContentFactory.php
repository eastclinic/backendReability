<?php

namespace Modules\Reviews\Database\factories;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Reviews\Entities\Review;
use Modules\Reviews\Entities\ReviewMessage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class ReviewContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected  $model = \Modules\Reviews\Entities\ReviewContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $reviewId = Review::all()->random()->id;
//        $reviewMessageId = $this->faker->randomElement([0, 0, 0, 0, ReviewMessage::all()->random()->id]);
//        $targetPassible = ['review' => Review::all()->random()->id, 'reviewMessage' => ReviewMessage::all()->random()->id];
//                $target = $this->faker->randomKey($targetPassible);




        return [
            'id' => Uuid::uuid4()->toString(),
            'url' => $this->faker->imageUrl(),
            'file' => 'upload'.DIRECTORY_SEPARATOR .$this->faker->file('storage/img', 'storage/img/upload', false),
            'file_extension' => $this->faker->randomElement(['jpg', 'avi']),
            'review_id' =>Review::all()->random()->id,
            'message_id' => $this->faker->randomElement([0, 0, 0, 0, ReviewMessage::all()->random()->id])

//            'contentable_type' => $target,
//            'contentable_id' =>$targetPassible[$target],




//            'review_id' => $this->faker->numberBetween(1, $reviews->count()),
        ];
    }
}

