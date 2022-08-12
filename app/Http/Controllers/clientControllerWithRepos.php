<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\ProductRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientControllerWithRepos extends Controller
{
    public function shop()
    {
        $product = ProductRepos::getAllProduct();
        return view('client.shop', [
            'product' => $product,
        ]);

    }

    public function detail($productID)
    {
        $product = AdminRepos::getProductById($productID);
//        $style = AdminRepos::getStlyeById($id);
//        $size = AdminRepos::getstylistbyProductid($id);
        return view('client.details', [
            'product' => $product[0],
//            'style' => $style[0],
//            'size' => $size[0],
//            'style' => DB::table('style')->get(),
//            'size' => DB::table('size')->get()
        ]);
    }
}
