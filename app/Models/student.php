<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'Students';

    protected $fillable = [
        'accID',
        'firstName',
        'lastName',
        'middleNameName',
        'gender',
        'age',
        'birthdate',
        'address',
        'contactNumber',
        'email',
        'courseYear',
        'program',
    ];

    public function account()
    {
        return $this->belongsTo(User::class, 'accID', 'id');
    }
    public function program()
    {
        return $this->belongsTo(programs::class, 'program', 'programName');
    }
    public function enrolledCourses()
    {
        return $this->hasMany(EnrolledCourses::class, 'studentID', 'id');
    }

    public function enrolledSections()
    {
        return $this->hasMany(EnrolledSections::class, 'studentID', 'id');
    }
}
