<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'other_group_id',
        'level_id',
        'name',
        'birth_at',
        'gender',
        'father',
        'mother',
        'community',
        'college',
        'course',
        'company',
    ];

    protected $hidden = [
        'id',
        'deleted_at',
    ];

    public function otherGroup()
    {
        return $this->belongsTo(Option::class);
    }

    public function level()
    {
        return $this->belongsTo(Option::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class, "person_id");
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, "person_id");
    }

    public function leaders()
    {
        return $this->hasMany(Leader::class, "person_id");
    }

    public function levers()
    {
        return $this->hasMany(Lever::class, "person_id");
    }

    public function members()
    {
        return $this->hasMany(Member::class, "person_id");
    }

    public function yougers()
    {
        return $this->hasMany(Record::class, "person_id");
    }

    public function presenters()
    {
        return $this->hasMany(Record::class, "presenter_id");
    }

    public function teams()
    {
        return $this->hasMany(Team::class, "person_id");
    }
}
