<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
