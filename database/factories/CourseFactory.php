<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'university_id' => University::first()->id,
            'name'          => $this->faker->jobTitle,
            'kind'          => $this->faker->word,
            'level'         => $this->faker->word,
            'shift'         => $this->faker->word,
            'price'         => $this->faker->randomFloat(2, 200,1000),
        ];
    }
}
