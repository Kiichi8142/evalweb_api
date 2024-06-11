<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "max_score",
    ];

    public function items()
    {
        return $this->hasMany(EvaluationItem::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
