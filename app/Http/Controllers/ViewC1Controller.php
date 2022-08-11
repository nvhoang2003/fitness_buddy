<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewC1Controller extends Controller
{
    //
    public function index(){

        return view('viewC1.index',[
            'product' => DB::table('product')->Paginate(  4),
            'style'   => DB::table('style')->Paginate(4)
        ]);
    }

    public function shop($offset){
        $style = AdminRepos::getallstyle();
//        $product = AdminRepos::productpagination($offset);
        return view('viewC1.shop',[
//            'product' => $product,
            'style' => $style
        ]);
    }
}
