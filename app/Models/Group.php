<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, UsesUuid;

    public $timestamps = false;

    protected $fillable = [
        'community_id',
        'frequency_id',
        'information',
    ];

    protected $hidden = [
        'id',
    ];

    public function community()
    {
        return $this->belongsTo(Option::class, "community_id");
    }

    public function frequency()
    {
        return $this->belongsTo(Option::class, "frequency_id");
    }

    public function scopeSearch($query, $term)
    {
        return $query->with(['community', 'frequency'])
        ->where(
            'information',
            'like',
            '%' . $term . '%'
        )->orWhere('communities.title', 'like', '%' . $term . '%'
        )->orWhere('frequencies.title', 'like', '%' . $term . '%'
        );
    }

    public function scopeSort($query, $sortField, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        return $query->select(
            [
                'groups.*', 
                'communities.title as community', 
                'frequencies.title as frequency',
            ]
        )->join('options as communities', 'groups.community_id', '=', 'communities.id')
        ->join('options as frequencies', 'groups.frequency_id','=', 'frequencies.id')
        ->get()
        ->sortBy([
            [$sortField, $direction]
        ]);
    }
}
