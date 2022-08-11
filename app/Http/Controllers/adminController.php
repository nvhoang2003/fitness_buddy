<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class adminController extends Controller
{
    //
    public function adminIndex($username)
    {
        // get data from table "admin" in database and return index admin
        $user = AdminRepos::getAdminById($username);

        return view('admin.index', [
            'user' => $user[0],
        ]);
    }

    public function adminUpdateInfo(Request $request, $username)
    {
        // check username's url same as username's database
        if ($username != $request->input('username')) {
            return redirect()->action('adminController@adminIndex');
        }
        // check username, contact, email not emty and email correct validate
        $this->validate($request,
            [
                'username' => ['required'],
                'contact' => ['required'],
                'email' => ['required', 'email:rfc,dns']
            ],
            [
                'username.required' => 'Username not be empty',
                'contact.required' => 'Contact not be empty',
                'email.required' => 'Email not be empty',
            ]
        );

        $user = (object)[
            'username' => $request->input('username'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
        ];

        AdminRepos::adminUpdateInfo($user);
        return redirect()->action('adminController@adminIndex');
    }

    public function adminChangePassword(Request $request, $username)
    {
        // check username's url same as username's database
        if ($username != $request->input('username')) {
            return redirect()->action('adminController@adminIndex');
        }
        // Check old_password's input equal password from database
        $this->validate($request,
            [
                'password' => ['required'],
                'new_password' => ['required'],
                'retire_password' => ['required',
                    function($attribute, $fails, $value){
                        global $request;
                        if($value !== $request->input('new_password')){
                            $fails("Retire Password must equal New Password");
                        }
                    }
                ]
            ],
            [
                'password.required' => 'password not be empty',
                'new_password.required' => 'New Password not be empty',
                'retire_password.required' => 'Retire Password not be empty',
            ]
        );
        // create user with type varaiable is object
        $user = (object)[
            'username' => $request->input('username'),
            'password' => $request->input('new_password'),
        ];
        // change password's datatbase with varaiable is new password
        AdminRepos::adminChangePassword($user);

        return redirect()->action('adminController@adminIndex');
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

        $stylist = (object)[
            'styleID' => $request->input('styleID'),
            'style_name' => $request->input('style_name'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
        ];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $stylist->urlimg = $image->getClientOriginalName();
            $image->move('images/stylist', $image->getClientOriginalName());

        }

        AdminRepos::updatestylist($stylist);

        return redirect()->action('adminController@stylistindex')
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
