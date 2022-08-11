<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function adminIndex(){
//        $user = AdminRepos::getAdminById($user_name);

        return view('admin.adminIndex');
    }

    // index of style - Bui Anh Tuan
    public function styleIndex(){
        $admin = AdminRepos::getAllStyle();
        return view('style.index',[
            'admin' => $admin
        ]);
    }

    // search of style - Bui Anh Tuan
    public function search(Request $request)
    {
        $style = AdminRepos::getStyleWithName($request->input('search'));

        return view('style.index',
            [
                'category' => $style,
            ]);
    }

    // delete style - Bui Anh Tuan
    public function confirm($style_id){
        $style = AdminRepos::getStyleById($style_id);
        $styleHaveProduct = AdminRepos::getProductByStyleId($style_id);

        if ($style === []){
            return view('notFound');
        }

        return view('style.confirm',
            [
                'category' => $style[0],
                'product' => $styleHaveProduct,
            ]
        );
    }

    public function destroy(Request $request, $style_id){
        if($style_id != $request->input('style_id')){
            return redirect()->action('adminController@styleindex');
        }

        AdminRepos::delete($style_id);

        return redirect()->action('adminController@styleindex');
    }












































    public function edit(){

        return view('product.edit');
    }
}
