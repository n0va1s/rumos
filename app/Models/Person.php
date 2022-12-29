<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, UsesUuid;

    public $timestamps = false;
    protected $table = 'person';

    protected $fillable = [
        'other_group_id',
        'level_id',
        'gender_id',
        'community_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'social',
        'birth_at',
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
        return $this->belongsTo(Option::class, "other_group_id");
    }

    public function level()
    {
        return $this->belongsTo(Option::class, "level_id");
    }

    public function gender()
    {
        return $this->belongsTo(Option::class, "gender_id");
    }

    public function community()
    {
        return $this->belongsTo(Option::class, "community_id");
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
