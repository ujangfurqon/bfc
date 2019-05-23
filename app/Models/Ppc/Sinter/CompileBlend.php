<?php

namespace App\Models\Ppc\Sinter;

use App\Models\Ppc\CompileBlend as CB;
use Illuminate\Database\Eloquent\Builder;

class CompileBlend extends CB
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('pb_type', function (Builder $builder) {
            $builder->where('pb_type', 'S');
        });
    }
}
