<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class CustomerClass
{
    public static function getAllCustomer(){
        $sql = 'select c.* ';
        $sql .= 'from customer as c ';
        $sql .= 'order by c.fullname';

        return DB::select($sql);
    }

    public static function getCustomerById($customerID){
        $sql = 'select c.* ';
        $sql .= 'from customer as c ';
        $sql .= 'where c.customerID = ? ';

        return DB::select($sql,[$customerID]);
    }

}
