<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    public $timestamps = false;
    protected $table = 'person_records';

    protected $fillable = [
        'person_id',
        'presenter_id',
        'reason',
        'other_information',
        'has_agreement',
        'has_acceptance',
        'has_first_communion',
        'has_chrism',
        'is_approved',
    ];

    protected $hidden = [
        'id',
    ];

    protected $casts = [
        'has_agreement' => 'boolean',
        'has_acceptance' => 'boolean',
        'has_first_communion' => 'boolean',
        'has_chrism' => 'boolean',
        'is_approved' => 'boolean',
        'created_at' => 'date',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }

    public function presenter()
    {
        return $this->belongsTo(Person::class, "presenter_id");
    }

    public function scopeSearch($query, $term)
    {
        return $query
        ->where('member.first_name','like','%' . $term . '%')
        ->orWhere('member.last_name','like','%' . $term . '%')
        ->orWhere('reason','like','%' . $term . '%')
        ->orWhere('other_information','like','%' . $term . '%')
        ->orWhere('community.title', 'like', '%' . $term . '%');
    }

    public function scopeSort($query, $sortField, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        return $query->select(
            [
                'person_records.id',
                DB::raw('DATE_FORMAT(person_records.created_at, "%d/%m/%Y") as created_at_fmt'),
                DB::raw("CONCAT(member.first_name,' ',member.last_name) as full_name"), 
                'community.title as community',
            ]
        )->join('person as member', 'person_records.person_id', '=', 'member.id')
        ->join('person as presenter', 'person_records.presenter_id', '=', 'presenter.id')
        ->join('options as community', 'member.community_id', '=', 'community.id')
        ->get()
        ->sortBy([
            [$sortField, $direction]
        ]);
    }
}
