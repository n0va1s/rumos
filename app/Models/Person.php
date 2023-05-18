<?php

namespace App\Models;

use App\Services\UtilService;
use App\Traits\UsesMultiTenancy;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, UsesUuid, SoftDeletes, UsesMultiTenancy;

    public $timestamps = false;
    protected $table = 'person';
    //protected $with = ['community'];

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
        'congregation',
        'college',
        'course',
        'company',
    ];

    protected $hidden = [
        'id',
        'deleted_at',
    ];

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function saveOrUpdate(array $data)
    {
        $person = Person::updateOrCreate(
            [
                'email' => $data['email'],
                'phone' => UtilService::clearFormat($data['phone'])
            ],
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
                    'city' => $data > ['city'],
                    'zipcode' => UtilService::clearFormat($data['zipcode']),
                    'state_id' => $data['uf_id'],
                ]
            );
        }
        return $person;
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(
            'community.title', 
            'like', '%' . $term . '%'
        )->orWhere(
            'first_name',
            'like',
            '%' . $term . '%'
        )->orWhere(
            'last_name',
            'like',
            '%' . $term . '%'
        )->orWhere(
            'email',
            'like',
            '%' . $term . '%'
        );
    }

    public function scopeSort($query, $sortField, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        return $query->select(
            [
                'person.*', 'community.title'
            ]
        )->join(
            'options as community',
            'community.id',
            '=',
            'person.community_id'
        )->orderBy($sortField, $direction);
    }

    public function otherGroup(): BelongsTo
    {
        return $this->belongsTo(Option::class, "other_group_id");
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Option::class, "level_id");
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Option::class, "gender_id");
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(Option::class, "community_id");
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, "person_id");
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, "person_id");
    }

    public function leaders(): HasMany
    {
        return $this->hasMany(Leader::class, "person_id");
    }

    public function levers(): HasMany
    {
        return $this->hasMany(Lever::class, "person_id");
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class, "person_id");
    }

    public function youngers(): HasMany
    {
        return $this->hasMany(Record::class, "person_id");
    }

    public function presenters(): HasMany
    {
        return $this->hasMany(Record::class, "presenter_id");
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, "person_id");
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class, "person_id");
    }
}
