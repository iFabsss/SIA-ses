<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    use HasFactory;

    protected $table = 'Professors';

    protected $fillable = ['Name'];

    public function sections()
    {
        return $this->hasMany(Sections::class, 'professor', 'id');
    }
}
