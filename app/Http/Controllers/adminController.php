<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\ProductRepos;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index(){
//        $user = AdminRepos::getAdminById($user_name);

        return view('admin.index');
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

    //product
    public function show($productID)
    {
        $product = ProductRepos::getProductById($productID);
//        $brand = BrandRepos::getBrandByProductId($product_id);
//        $category = CategoryRepos::getCategoryByProductId($product_id);

        return view('product.show',
            [
                'product' => $product[0]

            ]
        );
    }

    public function create(){
        $size = ProductRepos::getAllSize();
        $color = ProductRepos::getAllColor();
        $style = ProductRepos::getAllStyle();
        return view('product.create', [
            'product'=> (object)[
                'productID' => '',
                'product_name' => '',
                'product_status' => '',
                'price' => '',
                'launch_date' => '',
                'image' => '',
                'brand' => '',
                'material' => '',
            ],
            'size' => $size,
            'color' => $color,
            'style' => $style
        ]);
    }

    public function store(Request $request){
        if($request->has('image')){
            $file = $request-> image;
//            $ext = $request->file_upload->extension();
            $file_name = $file->getClientoriginalName();
//            dd($ext);
            $file->move(public_path('product'), $file_name);
            $request->merge(['product' => $file_name]);
        }
//        dd($request->all());
//        $this->formValidate($request)->validate(); //shortcut

        $product = (object)[
            'product_name' => $request->input('name'),
            'image' => $request->input('image'),
            'product_status' => $request->input('product_status'),
            'price' => $request->input('price'),
            'launch-date' => $request->input('launch_date'),
            'brand' => $request->input('brand'),
            'material' => $request->input('material'),
            'sizeID' => $request->input('size'),
            'colorID' => $request->input('color'),
            'SID' => $request->input('styleID'),
        ];

        $newId = ProductRepos::insert($product);


        return redirect()
            ->action('adminController@index')
            ->with('msg', 'New Product with id: '.$newId.' has been inserted');
    }











    public function edit(){

        return view('product.edit');
    }
































}
