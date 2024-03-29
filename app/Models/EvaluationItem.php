<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "score",
        "evaluation_id",
        "section_id"
    ];

    public function Evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
