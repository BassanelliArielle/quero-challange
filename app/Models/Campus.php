<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $university_id
 * @property string $name
 * @property string $city
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
*/

class Campus extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function university()
    {
        return $this->belongsTo(Campus::class);
    }
}
