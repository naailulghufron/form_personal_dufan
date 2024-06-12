<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class GlobalHelper
{
    public static function get_username($user_id)
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        return (isset($user->name) ? $user->name : '');
    }

    /**
     * @return string
     */
    public static function convertDateRange($date)
    {
        $a = explode(' ', $date);
        $b = explode('/', $a[0]);
        $c = explode('/', $a[array_key_last($a)]);
        // return $b;

        $date = [];
        array_push($date, $b[2] . '-' . $b[1] . '-' . $b[0]);
        array_push($date, $c[2] . '-' . $c[1] . '-' . $c[0]);
        return $date;
    }

    public static function splitDateRange($date): array
    {
        return explode(' ', $date);
    }
}
