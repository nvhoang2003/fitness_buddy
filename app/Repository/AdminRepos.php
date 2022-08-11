<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminRepos
{
    public static function getAllAdmin(){
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'order by a.username';

        return DB::select($sql);
    }

    public static function getAdminById($username){
        $sql = 'select a.* ';
        $sql .= 'from admin as a ';
        $sql .= 'where a.username = ? ';

        return DB::select($sql, [$username]);
    }





    public static function getProductById($productID){
        $sql = 'select p.* ';
        $sql .= 'from product as p ';
        $sql .= 'where p.productID =? ';

        return DB::select($sql, [$productID]);
    }

    //get all style from DB - Bui Anh Tuan
    public static function getAllStyle(){
        $sql = 'select s.* ';
        $sql .= 'from style as s ';
        $sql .= 'order by s.style_name';

        return DB::select($sql);
    }

    // get name of style from DB - Bui Anh Tuan
    public static function getStyleWithName($style_name){
        $sql = 'select * ';
        $sql .= 'from style ';
        $sql .= 'where style_name like ?';

        return DB::select($sql, ['%'.$style_name.'%']);
    }

    // get style by id from DB -Bui Anh Tuan
    public static function getStyleById($styleID){
        $sql = 'select s.* ';
        $sql .= 'from style as s ';
        $sql .= 'where s.styleID = ? ';

        return DB::select($sql, [$styleID]);
    }


    public static function getProductByStyleId($styleID){
        $sql = 'select s.*, s.styleID ';
        $sql .= 'from style as s ';
        $sql .= 'join product as p on s.styleID = p.styleID ';
        $sql .= 'where s.styleID = ? ';

        return DB::select($sql, [$styleID]);
    }

    public static function delete($styleID){
        $sql = 'delete from style ';
        $sql .= 'where styleID = ? ';

        return DB::delete($sql, [$styleID]);

    }

    // insert into style by id form DB - Do Khac Duong
    public static function insertstyle($style)
    {
        $sql = 'insert into style ';
        $sql .= '(style_name, image, description) ';
        $sql .= 'values(?, ?, ?) ';

        $result = DB::insert($sql, [$style->style_name, $style->image, $style->description]);
        if ($result){
            return DB::getPdo()->lastInsertID();
        }else {
            return -1;
        }
    }


    // update style by id form DB - Do Khac Duong
    public static function updatestyle($style)
    {
        $sql = 'update style ';
        $sql .= 'set style_name = ?, image = ?, description = ? ';
        $sql .= 'where styleID = ? ';

        DB::update($sql, [style->name, style->dob, style->contact, style->styleID]);
    }



}


