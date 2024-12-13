<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programs extends Model
{
    use HasFactory;

    protected $table = 'Programs';

    protected $primaryKey = 'programName';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['programName'];

    public function courses()
    {
        return $this->hasMany(Courses::class, 'program', 'programName');
    }
}
