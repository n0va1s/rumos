<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'person_id',
        'team_id',
        'information',
    ];


    protected $hidden = [
        'id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }

    public function person()
    {
        return $this->belongsTo(People::class, "person_id");
    }

    public function team()
    {
        return $this->belongsTo(Option::class, "team_id");
    }
}
