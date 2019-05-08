<?php

namespace App\Models\Bfc;

use Illuminate\Database\Eloquent\Model;



class Ladle extends Model
{
    protected $table = 'bgb_iron_ladle_in';
    protected $primaryKey = 'cux_id';
    public $timestamps = false;

    protected $fillable = [
        "CUX_ID",
        "IRON_CAN_ID",
        "IRON_ID",
        "IN_BEGIN",
        "IN_END",
        "CAN_ESTIMATE_WEIGHT",
        "CAN_ACTUAL_WEIGHT",
        "IRON_WEIGHT",
        "TO_PLACE",
        "CREW",
        "SHIFT",
        "CREATER",
        "CREATE_DATE",
        "UPDATER",
        "UPDATE_DATE",
        "IRON_SEQ",
        "SEND_FLAG",
        "SAP_DATE",
        "DATA_SOURCE",
        "IRON_BATCH_NO",
        "SEND_FLAG_TRANSFER",
        "SEND_FLAG_GR",
        "SEND_FLAG_ISSUE",
    ];

    public function scopeLadleInOne($query, $id)
    {
        return $query->where('iron_id', $id);
    }
}
