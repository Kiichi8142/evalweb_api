<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "firstname",
        "lastname",
        "position",
        "team_id"
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
