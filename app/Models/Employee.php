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
        "job_title_id",
        "organization_id",
        "team_id"
    ];

    public function job_title()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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
