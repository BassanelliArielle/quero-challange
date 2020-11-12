<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CoursesController extends Controller
{
    public function __invoke(Request $request)
    {
        $cacheKey = $this->getCacheKey('courses', $request->all());

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $query = Course::query()
            ->select([
                'courses.name',
                'kind',
                'level',
                'shift',
                'universities.name as university_name',
                'score',
                'logo_url',
                'campuses.name as campus_name',
                'city',
            ])
            ->join('universities', 'universities.id', '=', 'courses.university_id')
            ->join('campus_course', 'campus_course.course_id', '=', 'courses.id')
            ->join('campuses', 'campuses.id', '=', 'campus_course.campus_id');

        $query->when($request['university'], function($sub) use ($request) {
            $sub->where('universities.name', 'LIKE', '%' . $request['university'] . '%');
        });

        $query->when($request['kind'], function($sub) use ($request) {
            $sub->where('kind', 'LIKE', '%' . $request['kind'] . '%');
        });

        $query->when($request['level'], function($sub) use ($request) {
            $sub->where('level', 'LIKE', '%' . $request['level'] . '%');
        });

        $query->when($request['shift'], function($sub) use ($request) {
            $sub->where('shift', 'LIKE', '%' . $request['shift'] . '%');
        });

        $courses = CourseResource::collection($query->get());

        Cache::put($cacheKey, $courses, now()->addMinutes(30));
        return $courses;
    }
}
