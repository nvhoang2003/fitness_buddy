<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\ProductRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientControllerWithRepos extends Controller
{
    public function homepage()
    {
        $product = ProductRepos::getAllProduct();
        $topTrendingProduct = ProductRepos::getTopTrendingProduct();
        $style = ProductRepos::getAllStyle();
        return view('client.homepage', [
            'product' => $product,
            'topTrendingProduct' => $topTrendingProduct,
            'style' => $style,

        ]);

    }

    public function cart(){
        return view('client.cart');
    }


    public function shop()
    {
        $product = ProductRepos::getAllProduct();
        return view('client.shop', [
            'product' => $product,
        ]);

    }

    public function style($styleID){
        $product = ProductRepos::getAllStyle();

        return view('client.shop', [
            'product' => $product,
        ]);
    }

    public function details($productID)
    {
        $product = ProductRepos::getProductById($productID);
//        dd($product);
//        $style = AdminRepos::getStlyeById($id);
//        $size = AdminRepos::getstylistbyProductid($id);
        return view('client/details', [
            'product' => $product[0],
//            'style' => $style[0],
//            'size' => $size[0],
//            'style' => DB::table('style')->get(),
//            'size' => DB::table('size')->get()
        ]);
    }


}
