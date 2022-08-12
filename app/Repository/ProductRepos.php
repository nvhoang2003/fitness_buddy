<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ProductRepos
{
    public static function getAllProduct(){
        $sql = 'select p.*, s.size_name as size, style.style_name as style ';
        $sql .= 'from product as p ';
        $sql.='join size as s on p.sizeID = s.sizeID ';
        $sql.='join style on p.styleID = style.styleID ';
        $sql .= 'order by p.productID';

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

    public static function getSizeByProductId($productID){
        $sql = 'select s.*, p.productID ';
        $sql .= 'from size as s ';
        $sql .= 'join product as p on s.sizeID = p.sizeID ';
        $sql .= 'where p.productID = ? ';

        return DB::select($sql, [$productID]);
    }

    public static function getColorByProductId($id){
        $sql = 'select c.*, p.productID ';
        $sql .= 'from Color as c ';
        $sql .= 'join product as p on c.colerID = p.colerID ';
        $sql .= 'where p.productID = ?';

        return DB::select($sql, [$id]);
    }


    public static function delete($id){
        $sql = 'delete from product ';
        $sql .= 'where productID = ? ';

        return DB::delete($sql, [$id]);
    }

}
