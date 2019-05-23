<?php

namespace App\Myclass;

use Carbon\Carbon;

class str_date
{

    //format penulisan dateTime
    public static function conToDateTime($value)
    {
        $hasil = null;
        $len = strlen($value);

        if ($len > 7)
            switch ($len) {
                case 8:
                    $hasil = Carbon::parse($value)->format('Y-m-d');
                    break;
                case 12:
                    $hasil = Carbon::parse($value)->format('Y-m-d H:i');
                    break;
                case 14:
                    $hasil = Carbon::parse($value)->format('Y-m-d H:i:s');
                    break;
            }
        return ($hasil);
    }


    public static function strDate($value)
    {
        $hasil = null;
        //date
        if (strlen($value) >= 10) {
            $year = substr($value, 0, 4);
            $month = substr($value, 5, 2);
            $day = substr($value, 8, 2);

            $hasil = $year . $month . $day;
        }

        //dateTime 
        if (strlen($value) >= 18) {
            $h = substr($value, 11, 2);
            $m = substr($value, 14, 2);
            $s = substr($value, 17, 2);

            $hasil = $hasil . $h . $m . $s;
        }

        return $hasil;
    }
}
