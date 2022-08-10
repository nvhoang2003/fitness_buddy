<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index(){
//        $user = AdminRepos::getAdminById($user_name);

        return view('admin.index');
    }

    public function edit(){
        return view('product.edit');
    }
}
