<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledSections extends Model
{
    use HasFactory;

    protected $table = 'Enrolled_sections';

    protected $fillable = ['studentID', 'sectionID', 'courseID'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Sections::class, 'sectionID', 'sectionID');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseID', 'courseID');
    }
}
