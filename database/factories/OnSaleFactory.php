<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\OnSale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OnSaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OnSale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'           => Course::first()->id,
            'discount_percentage' => $this->faker->randomFloat(2, 5,100),
            'price_with_discount' => $this->faker->randomFloat(2, 200,900),
            'start_date'          => Carbon::now()->subDays(random_int(1, 10)),
            'enrollment_semester' => $this->faker->word,
            'enabled'             => $this->faker->boolean(false),
        ];
    }
}
