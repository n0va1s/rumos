<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UsesMultiTenancy
{
    protected static function bootUsesMultiTenancy() : void
    {
        static::creating(function ($model) {
            if ($model->id) {
                $model->community_id = auth()->user()->community_id;
            }
        });
        if(! auth()->user()->is_admin) {
            static::addGlobalScope('filtering_by_community_id', function(Builder $builder){
                $builder->where('community_id', auth()->user()->community_id);
            });
        }        
    }
}