<?php

namespace App\Models\Ppc;

use Illuminate\Database\Eloquent\Model;
use App\Myclass\str_date;


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
        if ($value == '0') $hasil = 'New';
        if ($value == '1') $hasil = 'Send';

        return $hasil;
    }

    public function getWeightAttribute($value)
    {
        return number_format($value, 0, ",", ".");
    }

    public function getPbStarTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getPbEndTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }


    // public function scopePertama($query)
    // {
    //     return $query->orderBy('PB_STAR_TIME', 'desc');
    // }

    // tes di tinker
    // App\Models\Ppc\Bf\CompileBlend::blastFurnace()->get();
    // public function scopeBlastfurnace($query)
    // {
    //     return $query->where('pb_type', 'G');
    // }

    // public function scopeSinter($query)
    // {
    //     return $query->where('pb_type', 'S');
    // }

    // public function scopeCoking($query)
    // {
    //     return $query->where('pb_type', 'J');
    // }

    // public function scopeYard($query)
    // {
    //     return $query->where('pb_type', 'H');
    // }
}
