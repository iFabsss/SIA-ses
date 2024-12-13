<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;

    protected $table = 'Sections';

    protected $primaryKey = 'sectionID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['sectionID', 'courseID', 'professor', 'schedule'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courseID', 'courseID');
    }

    public function professor()
    {
        return $this->belongsTo(Professors::class, 'professor', 'id');
    }
}
