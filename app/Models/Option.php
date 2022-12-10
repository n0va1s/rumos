<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory, UsesUuid;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'group',
    ];

    protected $hidden = [
        'id',
        'deleted_at',
    ];

    public function otherGroups()
    {
        return $this->hasMany(Person::class, "other_group_id");
    }

    public function levels()
    {
        return $this->hasMany(Person::class, "level_id");
    }

    public function communities()
    {
        return $this->hasMany(Course::class, "community_id");
    }

    public function types()
    {
        return $this->hasMany(Course::class, "type_id");
    }

    public function roles()
    {
        return $this->hasMany(Leader::class, "role_id");
    }

    public function teams()
    {
        return $this->hasMany(Team::class, "team_id");
    }

    public function groups()
    {
        return $this->hasMany(Group::class, "community_id");
    }

    public function frequency()
    {
        return $this->hasMany(Group::class, "frequency_id");
    }


}
