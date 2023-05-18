<?php

namespace App\Models;

use App\Traits\UsesMultiTenancy;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, UsesUuid, UsesMultiTenancy;

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
        return $query
            ->where(
                'information',
                'like',
                '%' . $term . '%'
            )->orWhere(
                'community.title',
                'like',
                '%' . $term . '%'
            )->orWhere(
                'frequency.title',
                'like',
                '%' . $term . '%'
            );
    }

    public function scopeSort($query, $sortField, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        return $query->select(
            ['groups.*', 'community.title', 'frequency.title']
        )->join(
            'options as community',
            'groups.community_id',
            '=',
            'community.id'
        )->join(
            'options as frequency',
            'groups.frequency_id',
            '=',
            'frequency.id'
        )->orderBy($sortField, $direction);
    }
}
