<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminRepos
{
    public static function getAllAdmin(){
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'order by a.full_name';

        return DB::select($sql);
    }






















    public static function getAdminById($user_name){
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'where a.user_name = ? ';

        return DB::select($sql, [$user_name]);
    }
}
