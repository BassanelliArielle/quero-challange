<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property int $university_id
 * @property string $name
 * @property string $kind
 * @property string $level
 * @property string $shift
 * @property float $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
*/

class Course extends Model
{
    use HasFactory;

    public function campuses()
    {
        return $this->belongsToMany(Campus::class);
    }

    public function onSales()
    {
        return $this->hasMany(OnSale::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
