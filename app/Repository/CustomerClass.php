<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class CustomerClass
{
//    get all customer from table "customer" in database - Pham Quang Hung
    public static function getAllCustomer(){
        $sql = 'select c.* ';
        $sql .= 'from customer as c ';
        $sql .= 'order by c.fullname';

        return DB::select($sql);
    }
//    get customer from table "customer" in database follow customerID - Pham Quang Hung
    public static function getCustomerById($customerID){
        $sql = 'select c.* ';
        $sql .= 'from customer as c ';
        $sql .= 'where c.customerID = ? ';

        return DB::select($sql,[$customerID]);
    }
//    add customer from table "customer" in database - Pham Quang Hung
    public static function insert($user){
        $sql = 'insert into ';
        $sql .= '(username, password, fullname, email, phonenumber, gender) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?)';

        return DB::select($sql,[$user->username, $user->password, $user->fullname,
            $user->email, $user->phonenumber, $user->gender]
        );
    }

    public static function getCustomerByUsername($username){
        $sql = 'select c.* ';
        $sql .= 'from customer as c ';
        $sql .= 'where c.username = ? ';

        return DB::select($sql,[$username]);
    }

    public static function update($user){
        $sql = 'update from customer ';
        $sql .= '(username, password, fullname, email, phonenumber, gender) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?)';

        return DB::select($sql,[$user->username, $user->password, $user->fullname,
                $user->email, $user->phonenumber, $user->gender]
        );
    }

}
