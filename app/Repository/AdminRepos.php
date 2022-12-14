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

    public static function adminUpdateInfo($user){
        $sql = 'update admin ';
        $sql .= 'set contact = ?, email = ? ';
        $sql .= 'where username = ? ';

        return DB::update($sql, [$user->contact, $user->email, $user->username]);
    }

    public static function adminChangePassword($user){
        $sql = 'update admin ';
        $sql .= 'set password = ? ';
        $sql .= 'where username = ? ';

        return DB::update($sql, [$user->password, $user->username]);
    }

//    public static function getProductById($productID){
//        $sql = 'select p.* ';
//        $sql .= 'from product as p ';
//        $sql .= 'where p.productID =? ';
//
//        return DB::select($sql, [$productID]);
//    }

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
        $sql = 'select s.*, p.styleID ';
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
    public static function updatestylewithimage($style)
    {
        $sql = 'update style ';
        $sql .= 'set style_name = ?, image = ?, description = ? ';
        $sql .= 'where styleID = ? ';

        DB::update($sql, [$style->style_name, $style->image, $style->description, $style->styleID]);
    }

    public static function updatestylewithoutimage($style)
    {
        $sql = 'update style ';
        $sql .= 'set style_name = ?, description = ? ';
        $sql .= 'where styleID = ? ';

        DB::update($sql, [$style->style_name, $style->description, $style->styleID]);
    }


    public static function getProductById($productID){
        $sql = 'select p.*, style.style_name as style  ';
        $sql .= 'from product as p ';
        $sql.='join style on p.styleID = style.styleID ';
        $sql .= 'where p.productID = ?';

        return DB::select($sql, [$productID]);
    }

    public static function getAllFeedback(){
        $sql = 'select * ';
        $sql .= 'from feed_back';

        return DB::select($sql);
    }
}


