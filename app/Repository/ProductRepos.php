<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ProductRepos
{
    public static function getAllProduct(){
        $sql = 'select p.*, style.style_name as style ';
        $sql .= 'from product as p ';
        $sql.='join style on p.styleID = style.styleID ';
        $sql .= 'order by p.productID';

//        return DB::select($sql);
        return DB::table('product')
            ->select('product.*')
            ->join('style', 'style.styleID', '=', 'product.styleID')
            ->paginate(12);
    }

    public static function getProductByStyle($productID){
        $sql = 'select p.*, s.style_name as style ';
        $sql .= 'from product as p ';
        $sql .='join style as s on p.styleID = s.styleID ';
        $sql .= 'where p.productID = ?';

        return DB::select($sql, [$productID]);
    }

    public static function getProductById($productID){
        $sql = 'select p.*, style.style_name as style ';
        $sql .= 'from product as p ';
        $sql .='join style on p.styleID = style.styleID ';
        $sql .= 'where p.productID = ?';

        return DB::select($sql, [$productID]);
    }

    public static function getSizeByProductID($productID){
        $sql = 'select p.size ';
        $sql .= 'from product as p ';
        $sql .= 'order by p.size';

        return DB::select($sql, [$productID]);
    }

    public static function getProductByStyleID($styleID){
        $sql = 'select p.*, style.style_name as style ';
        $sql .= 'from product as p ';
        $sql.='join style on p.styleID = style.styleID ';
        $sql .= 'where p.styleID = ?';

//        return DB::select($sql, [$styleID]);
        return DB::table('product')
            ->select('product.*')
            ->join('style', 'style.styleID', '=', 'product.styleID')
            ->where('product.styleID', '=', $styleID)
            ->paginate(12);
    }

    public static function getTopTrendingProduct(){
        $sql = 'select p.*, style.style_name as style ';
        $sql .= 'from product as p ';
        $sql .='join style on p.styleID = style.styleID ';
        $sql .= 'where p.price >= 50 ';

        return DB::select($sql);
    }

    public static function getAllStyle(){
        $sql = 'select * ';
        $sql .= 'from style ';
        $sql .= 'order by style_name';

        return DB::select($sql);
    }

    public static function insert($product){
        $sql = 'insert into product ';
        $sql .= '(product_name, product_status, price, launch_date, image, material, styleID, size, color, description) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ';

        $result = DB::insert($sql,
            [
                $product->product_name,
                $product->product_status,
                $product->price,
                $product->launch_date,
                $product->image,
                $product->material,
                $product->styleID,
                $product->size,
                $product->color,
                $product->description
            ]
        );

        if($result){
            return DB::getPdo()->lastInsertId();
        }else{
            return -1;
        }

    }

    public static function updateWithImage($product)
    {
        $sql = 'update product ';
        $sql .= 'set product_name = ?, product_status = ?, price = ?, launch_date = ?, image = ?, material = ?, styleID= ?, size= ?, color = ?, description = ? ';
        $sql .= 'where productID = ? ';

        DB::update($sql, [
            $product->product_name,
            $product->product_status,
            $product->price,
            $product->launch_date,
            $product->image,
            $product->material,
            $product->styleID,
            $product->size,
            $product->color,
            $product->description,
            $product->productID
        ]);
    }

    public static function updateWithoutImage($product)
    {
        $sql = 'update product ';
        $sql .= 'set product_name = ?, product_status = ?, price = ?, launch_date = ?, material = ?, styleID= ?, size= ?, color = ?,descripion = ? ';
        $sql .= 'where productID = ? ';

        DB::update($sql, [
            $product->product_name,
            $product->product_status,
            $product->price,
            $product->launch_date,
            $product->material,
            $product->styleID,
            $product->size,
            $product->color,
            $product->descripion,
            $product->productID
        ]);
    }

    public static function delete($id){
        $sql = 'delete from product ';
        $sql .= 'where productID = ? ';

        return DB::delete($sql, [$id]);
    }

    public static function getAllProductByStyleId($styleID)
    {
        $sql= 'select p.*, s.style_name as style ';
        $sql .= 'from product as p ';
        $sql .= 'join style as s on p.styleID= s.styleID ';
        $sql .= 'where s.styleID = ? ';
        $sql.='limit 4';

        return DB::select($sql, [$styleID]);
    }
}
