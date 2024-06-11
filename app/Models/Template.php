<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
