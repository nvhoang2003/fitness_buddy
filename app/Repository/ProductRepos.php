<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ProductRepos
{
    public static function getAllProduct(){
        $sql = 'select p.* ';
        $sql .= 'from product as p ';
        $sql .= 'order by p.pro';

        return DB::select($sql);
    }

    public static function getProductById($id){
        $sql = 'select p.* ';
        $sql .= 'from product as p ';
        $sql .= 'where p.productID = ?';

        return DB::select($sql, [$id]);
    }
}
