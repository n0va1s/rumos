<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'community_id',
        'type_id',
        'year',
        'number',
        'starts_at',
        'ends_at',
        'photo',
        'information',
    ];


    protected $hidden = [
        'id',
    ];

    public function community()
    {
        return $this->belongsTo(Option::class, "community_id");
    }

    public function type()
    {
        return $this->belongsTo(Option::class, "type_id");
    }

    public function leaders()
    {
        return $this->hasMany(Leader::class, "course_id");
    }

    public function members()
    {
        return $this->hasMany(Member::class, "course_id");
    }
    
    public function teams()
    {
        return $this->hasMany(Team::class, "course_id");
    }

    public function levers()
    {
        return $this->hasMany(Lever::class, "course_id");
    }
}
