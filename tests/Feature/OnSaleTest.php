<?php

namespace Tests\Feature;

use App\Models\Campus;
use App\Models\Course;
use App\Models\OnSale;
use App\Models\University;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OnSaleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->university = University::factory()->create();
        $this->campus = Campus::factory()->create([
            'university_id' => $this->university->id,
        ]);
        $this->course = Course::factory()->create([
            'university_id' => $this->university->id,
        ]);

        $this->campus->courses()->sync($this->course->id);

        // $this->actingAs($this->user);
    }

    public function testItShouldReturnOnSalesRouteSuccess()
    {
        $response = $this->get('/api/on-sales');

        $response->assertStatus(200);
    }

    public function testItShouldListOnSales()
    {

        OnSale::factory()->create([
            'course_id' => $this->course->id,
        ]);

        $response = $this->json('GET', '/api/on-sales');

        $structure = [
            'data' => [
                [
                    'full_price'         ,
                    'price_with_discount',
                    'discount_percentage',
                    'start_date'         ,
                    'enrollment_semester',
                    'enabled'            ,
                    'course' => [
                        'name' ,
                        'kind' ,
                        'level',
                        'shift',
                    ],
                    'university' => [
                        'name'    ,
                        'score'   ,
                        'logo_url',
                    ],
                    'campus' => [
                        'name',
                        'city',
                    ]
                ]
            ]
        ];

        return $response
            ->assertStatus(200)
            ->assertJsonStructure($structure);
    }
}
