<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\CustomerClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class manualController extends Controller
{
    // index admin's login
    public function ask(){

        return view('auth.login');
    }
//  sign in of admin's login and set session for display
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
//
    public function signout(){
//        delete Session and return login's page
        if(Session::has('username')){
            Session::forget('username');
        }

        return redirect()->action('manualController@ask');
    }

    public function customerAsk(){

        return view('auth.signin-customer');
    }
//  sign in of admin's login and set session for display
    public function customerSignin(Request $request){

//  check input can't empty, correct user name and password
        $this->validate($request,
            [
                'username' => ['required',
//                    check username's request input, if username's data from database empty return messeage, if not empty continue
                    function($attribute, $value, $fails){
                        global $request;
                        $DBuser = CustomerClass::getCustomerById($value);

                        if ($DBuser === []) {
                            $fails('Wrong user\'s name or password! Please try again');
                        }
                    },

                ],
                'password' => ['required',
//
                    function($attribute, $value, $fails){
                        global $request;
                        $user = CustomerClass::getAllCustomer();
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
//  put variable userName and password equal request input
        $userName = $request->input('username');
        $passwordHash = sha1($request->input('password'));

//  get data of admin from database
        $user = CustomerClass::getAllCustomer();
//  check request input, if true return index of product's page, if false return login's page
        foreach ($user as $u){
            if ($u->username === $userName&&
                $u->password ===  $passwordHash){
                Session::put('customer_name', $request->input('username'));
                return redirect()->route('client.homepage');
            }
        }

        return redirect()->action('manualController@customerAsk');
    }

    public function customerFormSignup(){

        return view('auth.signup-customer');
    }
//  sign in of admin's login and set session for display
    public function customerSignup(Request $request){

//  check input can't empty, correct user name and password
        $this->validate($request,
            [
                'username' => ['required'],
                'password' => ['required'],
                're_password' => ['required',

                ]
            ],
            [
                'username.required' => 'Name can not be empty.',
                'password.required' => 'Password can not be empty.',
            ]
        );
//  put variable userName and password equal request input
        $userName = $request->input('username');
        $passwordHash = sha1($request->input('password'));

//  get data of admin from database
        $user = CustomerClass::getAllCustomer();
//  check request input, if true return index of product's page, if false return login's page
        foreach ($user as $u){
            if ($u->username === $userName&&
                $u->password ===  $passwordHash){
                Session::put('customer_name', $request->input('username'));
                return redirect()->route('client.homepage');
            }
        }

        return redirect()->action('manualController@customerAsk');
    }

//logout of customer's account
    public function customerSignout(){
//        delete Session and return login's page
        if(Session::has('customer_name')){
            Session::forget('customer_name');
        }

        return redirect()->action('manualController@customerAsk');
    }

    private function formValidate($request){
        return Validator::make(
            $request->all(),
            [
                'username' => ['required',
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
