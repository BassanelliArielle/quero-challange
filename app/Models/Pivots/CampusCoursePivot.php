<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusCoursePivot extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'campus_course';
}
