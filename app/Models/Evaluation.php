<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function items()
    {
        return $this->hasMany(EvaluationItem::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function isCompleted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->items->every(fn(EvaluationItem $item) => $item->score > 0),
        );
    }
}
