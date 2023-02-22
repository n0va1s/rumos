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
        return $query->where(
            'information',
            'like',
            '%' . $term . '%'
        )->orWhereHas(
            'community',
            function (Builder $query) use ($term) {
                $query->where('title', 'like', '%' . $term . '%');
            }
        )->orWhereHas(
            'frequency',
            function (Builder $query) use ($term) {
                $query->where('title', 'like', '%' . $term . '%');
            }
        );
    }

    public function scopeOrderBy($query, $sortBy, $sortAsc)
    {
        $direction = $sortAsc ? 'asc' : 'desc';
        //source[0] = table
        //source[1] = field 
        $source = explode('.',$sortBy);
        if(!empty($source[1]))
        {
            return $query->whereHas(
                $source[0],
                function (Builder $query) use ($source, $direction) {
                    $query->orderBy($source[1], $direction);
                    
                }
            );
        }
    }
}
