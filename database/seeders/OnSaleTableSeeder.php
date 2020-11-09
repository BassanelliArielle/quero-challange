<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\OnSale;
use Illuminate\Database\Seeder;

class OnSaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        foreach( $courses as $course ) {
            OnSale::factory()->create([
                'course_id' => $course->id,
            ]);
        }
    }
}
