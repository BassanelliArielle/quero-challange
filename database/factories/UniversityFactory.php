<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = University::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->unique()->name . ' University',
            'score'    => $this->faker->randomFloat(1, 3, 5),
            'logo_url' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
