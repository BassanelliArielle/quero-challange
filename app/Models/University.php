<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $score
 * @property string $logo_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
*/

class University extends Model
{
    use HasFactory;

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
