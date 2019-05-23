<?php

namespace App\Models\Ppc;

use Illuminate\Database\Eloquent\Model;
use App\Myclass\str_date;
use Carbon\Carbon;
use Illuminate\Support\Carbon as IlluminateCarbon;

class CompileBlend extends Model
{
    protected $table = 'lt_sjs_pb';
    protected $primaryKey = 'seq';
    public $timestamps = false;

    protected $fillable = [
        'SEQ',
        'PBD_NO',
        'MACHINE_NO',
        'PBD_SCHEME',
        'WEIGHT',
        'ISACTIVE',
        'PB_STAR_TIME',
        'PB_END_TIME',
        'IN_EMP',
        'IN_DATE',
        'REMARKS',
        'STATUS',
        'PB_TYPE',
        'BAK1',
        'M_EMP',
        'M_DATE',
        'S_EMP',
        'S_DATE',
        'C_TYPE',
        'NEW_SEQ',
        'MAT_CD',
        'MAT_NAME',
    ];

    public function DetailBlends()
    {
        return $this->hasMany('App\Models\Ppc\DetailBlend', 'FATHER_SEQ', 'seq');
    }

    public function getStatusAttribute($value)
    {
        $hasil = null;
        // if ($value == '0') $hasil = 'New';
        if ($value == '1') {
            $hasil = 'Send';
        } else {
            $hasil = 'New';
        }

        return $hasil;
    }

    public function getWeightAttribute($value)
    {
        return number_format($value, 0, ",", ".");
    }

    public function getPbStarTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
        // return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function setPbStarTimeAttribute($value)
    {
        $this->attributes['pb_star_time'] = Carbon::createFromFormat('YmdHis', $value)->toDateTimeString();
    }

    public function getPbEndTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }
    public function getInDateAttribute($value)
    {
        return str_date::conToDateTime($value);
        // return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getMDateAttribute($val)
    {
        return str_date::conToDateTime($val);
        // return Carbon::parse($val)->format('Y-m-d H:i:s');
    }

    public function getSDateAttribute($val)
    {
        return str_date::conToDateTime($val);
        // return Carbon::parse($val)->format('Y-m-d H:i:s');
    }

    public function getPbTypeAttribute($val)
    {
        $hasil = null;
        switch ($val) {
            case 'G':
                $hasil = 'Blast Furnace';
                break;
            case 'S':
                $hasil = 'Sinter';
                break;
            case 'J':
                $hasil = 'Coke';
                break;
            case 'H':
                $hasil = 'Stock Yard';
                break;
        }

        return $hasil;
    }
}
