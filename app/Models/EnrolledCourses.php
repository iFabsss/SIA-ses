<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourses extends Model
{
    use HasFactory;

    protected $table = 'Enrolled_courses';

    protected $fillable = ['studentID', 'courseID'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseID', 'courseID');
    }
}
