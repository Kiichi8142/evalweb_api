<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "score",
        "evaluation_id"
    ];

    public function Evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
