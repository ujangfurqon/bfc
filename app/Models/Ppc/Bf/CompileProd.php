<?php

namespace App\Models\Ppc\Bf;

use Illuminate\Database\Eloquent\Model;
use App\Myclass\str_date;



class CompileProd extends Model
{
    // use ConcToDateOrDatetime;

    protected $table = 'bpb_glyscjh';
    protected $primaryKey = 'seq';
    public $timestamps = false;

    protected $fillable = [
        'y_m',
        'machine_no',
        'furn_effe_prod_days',
        'furn_plan_yiel',
        'stop_days',
        'status',
        'remarks',
        'in_emp',
        'in_date',
        'm_emp',
        'm_date',
        's_emp',
        's_date',
        'plan_star_time',
        'plan_end_time',
        'mat_code',
        'o_start_time',
        'o_end_time',
        'rownum',
    ];


    //join tabel  bpb_glyscjh dg tabel BBB_MATE_CD
    public function material()
    {
        return $this->belongsTo('App\Models\Setting\Material', 'mat_code', 'mate_cd');
    }

    // ---------------------- tampilkan format date (accessor) 
    public function getPlanStarTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getPlanEndTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getOStartTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }
    public function getOEndTimeAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getInDateAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getMDateAttribute($value)
    {
        return str_date::conToDateTime($value);
    }

    public function getSDateAttribute($value)
    {
        return str_date::conToDateTime($value);
    }


    public function getStatusAttribute($value)
    {
        $hasil = null;
        if ($value == '0') $hasil = 'New';
        if ($value == '1') $hasil = 'Send';

        return $hasil;
    }
    public function getMachineNoAttribute($value)
    {
        $hasil = null;
        if ($value == 'G1') $hasil = '1Blast Furnace';
        if ($value == 'G2') $hasil = '2Blast Furnace';

        return $hasil;
    }

    public function getFurnPlanYielAttribute($value)
    {
        return number_format($value, 0, ",", ".");
    }

    //----------------------------set format date ke string ketika save (mutator)
    public function setPlanStarTimeAttribute($value)
    {
        $this->attributes['plan_star_time'] = str_date::strDate($value);
    }

    public function setPlanEndTimeAttribute($value)
    {
        $this->attributes['plan_end_time'] = str_date::strDate($value);
    }
    public function setOStartTimeAttribute($value)
    {
        $this->attributes['o_start_time'] = str_date::strDate($value);
    }
    public function setOEndTimeAttribute($value)
    {
        $this->attributes['o_end_time'] = str_date::strDate($value);
    }



    public function scopeByProduk($query, $p)
    {
        return $query->where('y_m', 'LIKE', '%' . $p . '%');
    }

    public function scopeInPeriod($query, $start, $end)
    {
        return $query->where('plan_star_time', '>=', $start)
            ->where('plan_end_time', '<=', $end);
    }
}
