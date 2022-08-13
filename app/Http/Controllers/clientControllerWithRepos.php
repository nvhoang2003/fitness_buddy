<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\CustomerClass;
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
//        $product = ProductRepos::getallproductwithpagiation($offset);
        $product = ProductRepos::getAllProduct();
//        $color = ProductRepos::getAllColor();

        return view('client.shop', [
            'product' => $product,
//            'color' => $color
        ]);
    }

    public function style($styleID){
        $product = ProductRepos::getProductByStyleID($styleID);
//        $color = ProductRepos::getAllColor();


        return view('client.shop', [
            'product' => $product,
            'styleID' => $styleID
        ]);
    }

    public function details($productID)
    {
        $product = ProductRepos::getAllProduct();
        $product1 = ProductRepos::getAllProductByStyleId($product[0]->styleID);

//        dd($product);
//        $style = AdminRepos::getStlyeById($id);
//        $size = AdminRepos::getstylistbyProductid($id);
        return view('client/details', [
            'product' => $product[0],
            'product1' => $product1,
//            'style' => $style[0],
//            'size' => $size[0],
//            'style' => DB::table('style')->get(),
//            'size' => DB::table('size')->get()
        ]);
    }

    public function confirmUpdateInfo($username)
    {
        // get data from table "admin" in database and return index admin
        $user = CustomerClass::getCustomerById($username);

        return view('customer.account', [
            'user' => $user[0],
        ]);
    }

    // change admin's info anyway - Pham Quang Hung
    public function updateInfo(Request $request, $username)
    {
        // check username's url same as username's database
        if ($username != $request->input('username')) {
            return redirect()->action('clientControllerWithRepos@confirmUpdateInfo');
        }
        // check username, contact, email not emty, email correct validate and confirm password for accept
        $this->validate($request,
            [
                'email' => ['required', 'email:rfc,dns'],
                'fullname' => ['required'],
                'phonenumber' => ['required'],
                'gender' => ['required'],
                'password' => ['required',
                    function($attribute, $value, $fails){
                        global $request;
                        $user = CustomerClass::getCustomerById($request->input('username'));
                        $passwordHash = sha1($request->input('password'));

                        if ($user[0]->password !== $passwordHash){
                            $fails('Wrong password! Please try again');
                        }
                    },
                ],
            ],
            [
                'contact.required' => 'Contact not be empty',
                'email.required' => 'Email not be empty',
                'password.required' => 'Please confirm password for accept!'
            ]
        );
        // create user with type varaiable is object
        $user = (object)[
            'username' => $request->input('username'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
        ];
        // update from admin with data "$user"
        AdminRepos::adminUpdateInfo($user);
        return redirect()
            ->action('adminController@adminConfirmUpdateInfo',['username' => $user->username])
            ->with('msg', 'Update Successfully');
    }

    // amdin's password
    public function adminConfirmChangePassword($username)
    {
        // get data from table "admin" in database and return index admin
        $user = AdminRepos::getAdminById($username);

        return view('admin.confirmChangePassword', [
            'user' => $user[0],
        ]);
    }

    // change admin's password anyway - Pham Quang Hung
    public function adminChangePassword(Request $request, $username){
        // check username's url same as username's database
        if ($username != $request->input('username')) {
            return redirect()->action('adminController@productIndex');
        }
        // Check old_password's input equal password from database
        $this->validate($request,
            [
                'password' => ['required',
//
                    function($attribute, $value, $fails){
                        global $request;
                        $user = AdminRepos::getAdminById($request->input('username'));
                        $passwordHash = sha1($request->input('password'));

                        if ($user[0]->password !== $passwordHash){
                            $fails('Wrong password! Please try again');
                        }
                    },
                ],
                'new_password' => ['required'],
                're_password' => ['required',
                    function($attribute, $value, $fails){
                        global $request;
                        $new_password =  $request->input('new_password') ?? null;
                        if($value !== $new_password && $new_password !== null ){
                            $fails('Retire Password must same New Password');
                        }
                    }
                ]
            ],
            [
                'password.required' => 'password not be empty',
                'new_password.required' => 'New Password not be empty',
                're_password.required' => 'Retire Password not be empty',
            ]
        );
        // create user with type varaiable is object
        $passwordHash = sha1($request->input('new_password'));
        $user = (object)[
            'username' => $request->input('username'),
            'password' => $passwordHash
        ];
        // change password's datatbase with varaiable is new password
        AdminRepos::adminChangePassword($user);

        return redirect()
            ->action('adminController@adminConfirmUpdateInfo', ['username' => $user->username])
            ->with('msg', 'Change Password Successfully');
    }
}
