<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;

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





































    public function edit(){

        return view('product.edit');
    }
}
