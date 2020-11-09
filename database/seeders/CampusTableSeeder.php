<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\University;
use Illuminate\Database\Seeder;

class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = University::all();

        foreach ( $universities as $university) {
            Campus::factory()->count(2)->create([
                'university_id' => $university->id,
            ]);
        }
    }
}
