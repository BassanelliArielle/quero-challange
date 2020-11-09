<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $course_id
 * @property float $discount_percentage
 * @property float $price_with_discount
 * @property Carbon $start_date
 * @property string $enrollment_semester
 * @property boolean $enabled
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
*/

class OnSale extends Model
{
    use HasFactory;

    protected $casts = [
        'enabled'    => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
