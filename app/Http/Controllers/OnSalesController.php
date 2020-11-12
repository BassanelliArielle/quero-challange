<?php

namespace App\Http\Controllers;

use App\Http\Resources\OnSaleResource;
use App\Models\OnSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OnSalesController extends Controller
{
    public function __invoke(Request $request)
    {
        $cacheKey = $this->getCacheKey('on-sales', $request->all());

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $query = OnSale::query()
            ->select([
                'courses.price',
                'price_with_discount',
                'discount_percentage',
                'start_date',
                'enrollment_semester',
                'enabled',
                'courses.name as course_name',
                'kind',
                'level',
                'shift',
                'universities.name as university_name',
                'score',
                'logo_url',
                'campuses.name as campus_name',
                'city',
            ])
            ->join('courses', 'courses.id', '=', 'on_sales.course_id')
            ->join('universities', 'universities.id', '=', 'courses.university_id')
            ->join('campus_course', 'campus_course.course_id', '=', 'on_sales.course_id')
            ->join('campuses', 'campuses.id', '=', 'campus_course.campus_id')
            ->withCasts([
                'start_date' => 'datetime'
            ]);

        $query->when($request['university'], function($sub) use ($request) {
            $sub->where('universities.name', 'LIKE', '%' . $request['university'] . '%');
        });

        $query->when($request['course'], function($sub) use ($request) {
            $sub->where('courses.name', 'LIKE', '%' . $request['course'] . '%');
        });

        $query->when($request['kind'], function($sub) use ($request) {
            $sub->where('courses.kind', 'LIKE', '%' . $request['kind'] . '%');
        });

        $query->when($request['level'], function($sub) use ($request) {
            $sub->where('courses.level', 'LIKE', '%' . $request['level'] . '%');
        });

        $query->when($request['shift'], function($sub) use ($request) {
            $sub->where('courses.shift', 'LIKE', '%' . $request['shift'] . '%');
        });

        $query->when($request['city'], function($sub) use ($request) {
            $sub->where('campuses.city', 'LIKE', '%' . $request['city'] . '%');
        });

        $query->when($request['sort_direction'], function($sub) use ($request) {
            $sub->orderBy('price_with_discount', $request['sort_direction']);
        });

        $onSales = OnSaleResource::collection($query->get());

        Cache::put($cacheKey, $onSales, now()->addMinutes(30));
        return $onSales;
    }
}
