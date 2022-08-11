<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientControllerWithRepos extends Controller
{
    public function shop()
    {
        return view('client.shop',[
            'product' => DB::table('product')->Paginate(  9),
        ]);

    }

    public function detail()
    {
        return view('client.details');
    }

}
