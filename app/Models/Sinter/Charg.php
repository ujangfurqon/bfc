<?php

namespace App\Models\Sinter;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Charg extends Model
{
    protected $table = 's_trou_blank';
    protected $primaryKey = 'seq';
    public $timestamps = false;

    public function getStartTimeAttribute()
    {
        return Carbon::parse($this->time_from)->format('Y-m-d H:i:s');
    }

    public function getEndTimeAttribute()
    {
        return Carbon::parse($this->time_to)->format('Y-m-d H:i:s');
    }

    public function getRecordDateAttribute()
    {
        return Carbon::parse($this->rec_date)->format('Y-m-d H:i:s');
    }
    
}
