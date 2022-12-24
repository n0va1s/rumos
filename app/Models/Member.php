<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'course_members';

    protected $fillable = [
        'course_leader_id',
        'person_id',
        'information',
    ];


    protected $hidden = [
        'id',
    ];

    public function courseLeader()
    {
        return $this->belongsTo(courseLeader::class, "course_leader_id");
    }

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }
}
