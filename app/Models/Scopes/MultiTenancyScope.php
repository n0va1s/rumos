<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class MultiTenancyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if(! auth()->user()->is_admin) {
            $builder->where(                    
                $model->qualifyColumn('community_id'), 
                auth()->user()->community_id
            );          
        }
    }
}
