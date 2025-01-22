<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_student', 'student_id', 'lecture_id');
    }
}
