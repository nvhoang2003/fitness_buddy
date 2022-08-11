<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class manualController extends Controller
{
    //
    public function ask(){

        return view('auth.login');
    }

    public function signin(Request $request){
//  check input can't empty, correct user name and password
        $this->formValidate($request)->validate();
//  put variable userName and password equal request input
        $userName = $request->input('username');
        $passwordHash = sha1($request->input('password'));

//  get data of admin from database
        $user = AdminRepos::getAllAdmin();
//  check request input, if true return index of product's page, if false return login's page
        foreach ($user as $u){
            if ($u->username === $userName&&
                $u->password ===  $passwordHash){
                Session::put('username', $request->input('username'));
                return redirect()->route('product.index');
            }
        }

        return redirect()->action('manualController@ask');
    }

    public function signout(){
//        delete Session and return login's page
        if(Session::has('username')){
            Session::forget('username');
        }

        return redirect()->action('manualController@ask');
    }

    private function formValidate($request){
        return Validator::make(
            $request->all(),
            [
                'user_name' => ['required',
//                    check username's request input, if username's data from database empty return messeage, if not empty continue
                    function($attribute, $value, $fails){
                        global $request;
                        $DBuser = AdminRepos::getAdminById($value);

                        if ($DBuser === []) {
                            $fails('Wrong user\'s name or password! Please try again');
                        }
                    },

                ],
//                check password's request input equal password's data from database
                'password' => ['required',
//
                    function($attribute, $value, $fails){
                        global $request;
                        $user = AdminRepos::getAllAdmin();
                        $userName = $request->input('username');
                        $passwordHash = sha1($request->input('password'));
                        foreach ($user as $u){
                            if ($u->password !== $passwordHash && $u->username === $userName){
                                $fails('Wrong user\'s name or password! Please try again');
                            }
                        }
                    },
                ]
            ],
            [
                'username.required' => 'Name can not be empty.',
                'password.required' => 'Password can not be empty.',
            ]
        );
    }
}
