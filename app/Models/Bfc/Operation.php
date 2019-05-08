<?php

namespace App\Models\Bfc;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Operation extends Model
{
    protected $table = 'bg_ctsj';
    protected $primaryKey = 'BF_IRON_ID';
    public $timestamps = false;

    protected $fillable = [
        "BF_CUX_ID",
        "BF_ID",
        "BF_IRON_ID",
        "BF_MAT_CODE",
        "BF_MAT_NAME",
        "BF_BEGIN",
        "BF_END",
        "BF_HOLE",
        "BF_IRON_THEORY",
        "IRON_ESTIMATE",
        "IRON_SUM",
        "IRON_TEMPERATURE",
        "HOLE_DEPTH",
        "WIND_PRESSURE",
        "HOLE_OPEN",
        "MUD_SUM",
        "IS_ON_TIME",
        "IS_WIND",
        "IS_FINISHED",
        "IS_BURNED",
        "IS_BUBBLE",
        "CREW",
        "SHIFT",
        "ELE_C",
        "ELE_SI",
        "ELE_MN",
        "ELE_P",
        "ELE_S",
        "REMARKS",
        "CREATER",
        "CREATE_DATE",
        "UPDATER",
        "UPDATE_DATE"
    ];

    public function scopePerdana($query)
    {
        return $query->orderBy('BF_IRON_ID', 'desc');
    }

    private function conToDateTime($value)
    {
        $hasil = null;
        $len = strlen($value);

        if ($len == 8) {
            return Carbon::parse($value)->format('Y-m-d');
        }

        if ($len == 14)
            $hasil = Carbon::parse($value)->format('Y-m-d H:i:s');

        return ($hasil);
    }

    public function scopeFindTapping($query, $p)
    {
        return $query->where('bf_iron_id', 'LIKE', '%' . $p . '%');
    }

    public function scopeFindPeriod($query, $start, $end)
    {
        return $query->where('bf_begin', '>=', $start)
            ->where('bf_end', '<=', $end);
    }

    public function getBfBeginAttribute($value)
    {
        return $this->conToDateTime($value);
    }

    public function getBfEndAttribute($value)
    {
        return $this->conToDateTime($value);
    }
}
