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
    public static function getAllSize(){
        $sql = 'select s.* ';
        $sql .= 'from size as s ';
        $sql .= 'order by s.size_name';

        return DB::select($sql);
    }
    public static function getAllStyle(){
        $sql = 'select * ';
        $sql .= 'from style ';
        $sql .= 'order by style_name';

        return DB::select($sql);
    }
    public static function getAllColor(){
        $sql = 'select co.* ';
        $sql .= 'from color as co ';
        $sql .= 'order by co.color_name';

        return DB::select($sql);
    }

    public static function insert($product){
        $sql = 'insert into product ';
        $sql .= '(product_name, product_status, price, launch_date, image, brand, material, SID, sizeID, ColorID) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ';

        $result = DB::insert($sql,
            [
                $product->product_name,
                $product->product_status,
                $product->price,
                $product->launch_date,
                $product->image,
                $product->brand,
                $product->material,
                $product->SID,
                $product->sizeID,
                $product->ColorID

            ]
        );

        if($result){
            return DB::getPdo()->lastInsertId();
        }else{
            return -1;
        }

    }
}
