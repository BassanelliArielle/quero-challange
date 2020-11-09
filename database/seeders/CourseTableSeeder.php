<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Course;
use App\Models\University;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = University::all();

        foreach( $universities as $university ) {
            $courses = Course::factory()->count(2)->create([
                'university_id' => $university->id,
            ]);

            $campuses = Campus::all();

            foreach ( $campuses as $campus ) {
                $campus->courses()->sync($courses->pluck('id'));
            }
        }
    }
}
