<?php

namespace App\Models\Ppc\Stockyard;

use App\Models\Ppc\CompileBlend as CB;
use Illuminate\Database\Eloquent\Builder;

class CompileBlending extends CB
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('pb_type', function (Builder $builder) {
            $builder->where('pb_type', 'H');
        });
    }
}
