<?php

namespace App\Models;

use App\Services\UtilService;
use App\Traits\UsesMultiTenancy;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, UsesUuid;//, UsesMultiTenancy;

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

    public function getFullName(User $user)
    {
        return $user->first_name.' '.$user->last_name;
    }
    
    public static function saveOrUpdate(array $data)
    {
        $person = Person::updateOrCreate(
            [
                'email' => $data['email'],
                'phone' => UtilService::clearFormat($data['phone'])],
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => UtilService::clearFormat($data['phone']),
                'social' => $data['social'],
                'birth_at' => $data['birth_at'],
                'gender_id' => $data['gender_id']
            ]
        );
        if ($person->id && !empty($data['zipcode'])) {
            Address::updateOrCreate(
                [
                    'zipcode' => UtilService::clearFormat($data['zipcode']),
                ],
                [
                    'person_id' => $person->id,
                    'description' => $data['description'],
                    'number' => $data['number'],
                    'city' => $data>['city'],
                    'zipcode' => UtilService::clearFormat($data['zipcode']),
                    'state_id' => $data['uf_id'],
                ]
            );
        }
        return $person;
    }

    public function scopeSearch($query, $term)
    {
        return $query->with(['community'])
        ->where('communities.title','like','%' . $term . '%'
        )->orWhere('first_name', 'like', '%' . $term . '%'
        )->orWhere('last_name', 'like', '%' . $term . '%'
        )->orWhere('email', 'like', '%' . $term . '%'
        )->orWhere('community', 'like', '%' . $term . '%');
    }

    public function scopeSort($query, $sortField, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        return $query->select(
            [
                'person.*', 
                'communities.title as community', 
            ]
        )->join('options as communities', 'person.community_id', '=', 'communities.id')
        ->get()
        ->sortBy([
            [$sortField, $direction]
        ]);
    }
    
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

    public function youngers()
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

    public function records()
    {
        return $this->hasMany(Record::class, "person_id");
    }
}
