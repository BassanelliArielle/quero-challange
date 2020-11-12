<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OnSaleResource extends JsonResource
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
            'full_price'          => $this->price,
            'price_with_discount' => $this->price_with_discount,
            'discount_percentage' => $this->discount_percentage,
            'start_date'          => $this->start_date->format('d/m/Y'),
            'enrollment_semester' => $this->enrollment_semester,
            'enabled'             => $this->enabled,
            'course'              => [
                'name'  => $this->course_name,
                'kind'  => $this->kind,
                'level' => $this->level,
                'shift' => $this->shift,
            ],
            'university' => [
                'name'     => $this->university_name,
                'score'    => $this->score,
                'logo_url' => $this->logo_url,
            ],
            'campus' => [
                'name' => $this->campus_name,
                'city' => $this->city,
            ]
        ];
    }
}
