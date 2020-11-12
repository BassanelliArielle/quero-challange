<?php

namespace Tests\Feature;

use App\Models\Campus;
use App\Models\Course;
use App\Models\University;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->university = University::factory()->create();
        $this->campus = Campus::factory()->create([
            'university_id' => $this->university->id,
        ]);

        // $this->actingAs($this->user);
    }

    public function testItShouldReturnCoursesEndpointSuccess()
    {
        $response = $this->get('/api/courses');

        $response->assertStatus(200);
    }

    public function testItShouldListCourses()
    {

        $courses = Course::factory()->count(3)->create([
            'university_id' => $this->university->id,
        ]);

        $this->campus->courses()->sync($courses->pluck('id'));

        $response = $this->json('GET', '/api/courses');

        $structure = [
            'data' => [
                [
                    'course' => [
                        'name',
                        'kind',
                        'level',
                        'shift',
                        'university' => [
                            'name',
                            'score',
                            'logo_url',
                        ],
                        'campus'   => [
                            'name',
                            'city',
                        ]
                    ]
                ]
            ]
        ];

        return $response
            ->assertStatus(200)
            ->assertJsonStructure($structure);
    }
}
