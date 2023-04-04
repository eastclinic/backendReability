<?php

namespace Modules\Doctors\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Doctors\Entities\Doctor;

class DoctorFactory extends Factory
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
            'iid' => $this->faker->numberBetween(1, 100),
            'id_resource' => $this->faker->numberBetween(1, 100),
            'uri' => $this->faker->url,
            'surname' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'middlename' => $this->faker->firstName,
            'fullname' => $this->faker->name,
            'photo' => $this->faker->imageUrl(),
            'photo_type' => $this->faker->fileExtension,
            'photos' => json_encode([
                ['url' => $this->faker->imageUrl()],
                ['url' => $this->faker->imageUrl()],
                ['url' => $this->faker->imageUrl()],
            ]),
            'holiday' => $this->faker->boolean,
            'rating' => $this->faker->numberBetween(1, 10),
            'rating5' => $this->faker->randomFloat(2, 1, 5),
            'comments' => $this->faker->numberBetween(1, 100),
            'show_comments' => $this->faker->boolean,
            'child' => $this->faker->numberBetween(0, 18),
            'pregnant' => $this->faker->boolean,
            'diseases' => $this->faker->text,
            'experience' => $this->faker->numberBetween(1, 50),
            'way_experience' => $this->faker->text,
            'show_experience' => $this->faker->boolean,
            'telemedicine' => $this->faker->boolean,
            'training' => $this->faker->text,
            'longtitle' => $this->faker->text,
            'description' => $this->faker->text,
            'introtext' => $this->faker->text,
            'content' => $this->faker->text,
            'age_from' => $this->faker->numberBetween(0, 100),
            'age_to' => $this->faker->numberBetween(0, 100),
            'iskill' => $this->faker->boolean,
            'is_primary_care' => $this->faker->boolean,
            'is_doctor' => $this->faker->boolean,
            'is_nurse' => $this->faker->boolean,
            'is_analyze' => $this->faker->boolean,
            'off' => $this->faker->boolean,
            'research' => $this->faker->text,
            'diploms' => $this->faker->text,
            'quotes' => $this->faker->sentence(20),
            'interviews' => $this->faker->text,
            'awards' => $this->faker->text,
        ];
    }
}

