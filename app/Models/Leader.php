<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'course_leaders';

    protected $fillable = [
        'course_id',
        'person_id',
        'role_id',
        'information',
    ];


    protected $hidden = [
        'id',
    ];

    public function getMonitors($id)
    {

        return Leader::whereHas(
            'role',
            function (Builder $query) {
                $query->where('title', '=', 'Monitor');
            }
        )->where('course_id', $id)
            ->get();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }

    public function members()
    {
        return $this->hasMany(Member::class, "course_leader_id");
    }

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }

    public function role()
    {
        return $this->belongsTo(Option::class, "role_id");
    }
}
