<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'max_score',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
