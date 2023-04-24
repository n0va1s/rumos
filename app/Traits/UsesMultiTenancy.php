<?php

namespace App\Traits;

use App\Models\Scopes\MultiTenancyScope;

trait UsesMultiTenancy
{
    protected static function bootUsesMultiTenancy() : void
    {
        static::creating(function ($model) {
            if ($model->id) {
                $model->community_id = auth()->user()->community_id;
            }
        });
        
        static::addGlobalScope(new MultiTenancyScope);
    }
}