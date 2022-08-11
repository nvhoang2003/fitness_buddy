<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class adminController extends Controller
{
    //
    public function index(){
//        $user = AdminRepos::getAdminById($user_name);

        return view('admin.index');
    }

    // index of style - Bui Anh Tuan
    public function styleIndex(){
        $style = AdminRepos::getAllStyle();
        return view('style.index',[
            'style' => $style
        ]);
    }

    // search of style - Bui Anh Tuan
    public function search(Request $request)
    {
        $style = AdminRepos::getStyleWithName($request->input('search'));

        return view('style.index',
            [
                'style' => $style,
            ]);
    }

    //show style - Do Khac Duong
    public  function showstyle($id){

        $style = AdminRepos::getstylebyid($id);
        return view('style.show',[
            'style' => $style[0]
        ]);
    }

    //create style - Do Khac Duong
    public function stylecreate()
    {
        $stylist = AdminRepos::getallstyle();
        return view(
            'style.create',
            [
                "style" => (object)[
                    'style_name' => '',
                    'image' => '',
                    'description' => ''
                ],
            ]);

    }

    public function storestyle(Request $request)
    {
        $this->formValidate($request)->validate();

        $style = (object)[
            'style_name' => $request->input('style_name'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
        ];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $style->image = $image->getClientOriginalName();
            $image->move('images/style', $image->getClientOriginalName());

        }

        $newstyle = AdminRepos::insertstyle($style);
        return redirect()
            ->action('adminController@styleindex')
            ->with('msg', 'New Style with id: '.$newstyle.' has been inserted');
    }

    //update style - Do Khac Duong
    public function updatestyle(Request $request, $style)
    {
        if ($style != $request->input('styleID')) {
            return redirect()->action('adminController@stylistindex');
        }

        $this->formValidate($request)->validate();

        $style = (object)[
            'styleID' => $request->input('styleID'),
            'style_name' => $request->input('style_name'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $style->urlimg = $image->getClientOriginalName();
            $image->move('images/style', $image->getClientOriginalName());

        }

        AdminRepos::updatestyle($style);

        return redirect()->action('adminController@styleindex')
            ->with('msg', 'Update Successfully');
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

    private function formValidate(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'style_name' => ['required'],
                'image' => ['required'],
                'description' => ['required'],
            ],
            [
                'style_name.required' => 'Stylist name can not be empty',
                'image.required' => 'DOB can not be empty',
                'description.required' => 'Contact can not be empty',
            ]
        );
    }












































    public function edit(){

        return view('product.edit');
    }

}
