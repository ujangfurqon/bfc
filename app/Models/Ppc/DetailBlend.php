<?php

namespace App\Models\Ppc;

use Illuminate\Database\Eloquent\Model;

class DetailBlend extends Model
{
    protected $table = 'bpb_matchange';
    protected $primaryKey = 'seq';
    public $timestamps = false;

    protected $fillable = [
        'SEQ',
        'FATHER_SEQ',
        'MAT_NA',
        'MAT_CODE',
        'PB',
        'IN_EMP',
        'IN_DATE',
        'REMARKS',
        'M_EMP',
        'M_DATE',
        'C_TYPE',
        'ISACTIVE',
        'NEW_SEQ',
        'BATCH'
    ];

    public function compileBlend()
    {
        return $this->belongsTo('App\Models\Ppc\CompileBlend', 'father_seq', 'seq');
    }
}
