<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_name',
        'start_time',
        'end_time',
        'lecture_week',
        'notes',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'lecture_student', 'lecture_id', 'student_id');
    }

}
