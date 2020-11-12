<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'course' => [
                'name'       => $this->name,
                'kind'       => $this->kind,
                'level'      => $this->level,
                'shift'      => $this->shift,
                'university' => [
                    'name'     => $this->university_name,
                    'score'    => $this->score,
                    'logo_url' => $this->logo_url,
                ],
                'campus'   => [
                    'name' => $this->campus_name,
                    'city' => $this->city
                ]
            ]
        ];
    }
}
