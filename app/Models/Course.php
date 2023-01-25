<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, UsesUuid;

    public $timestamps = false;

    protected $fillable = [
        'community_id',
        'type_id',
        'number',
        'starts_at',
        'ends_at',
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

    public function teams()
    {
        return $this->hasMany(Team::class, "course_id");
    }

    public function levers()
    {
        return $this->hasMany(Lever::class, "course_id");
    }

    public function photo()
    {
        return $this->hasOne(Photo::class, "course_id");
    }

    public function getMembers($id)
    {
        return Member::whereHas(
            'monitor',
            function (Builder $query) use ($id) {
                $query->where('course_id', '=', $id);
            }
        )->with('person')->get();
    }
}
