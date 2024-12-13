<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'Courses';

    protected $primaryKey = 'courseID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['courseID', 'courseName', 'program'];

    public function program()
    {
        return $this->belongsTo(programs::class, 'program', 'programName');
    }

    public function sections()
    {
        return $this->hasMany(Sections::class, 'courseID', 'courseID');
    }

    public function enrolledSections()
    {
        return $this->hasMany(EnrolledSections::class, 'courseID', 'courseID');
    }
}
