<?php

namespace App\Models\Sinter;

use Illuminate\Database\Eloquent\Model;

class Bunker extends Model
{
    protected $table = 's_trou_level';
    protected $primaryKey = 'seq';
    public $timestamps = false;
}
