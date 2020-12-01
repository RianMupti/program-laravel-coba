<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class SiteHelpers{
    public static function cek_akses() {
        $user = DB::table('users')->where('username', 'miong')->first();

        return $user;
    }
}