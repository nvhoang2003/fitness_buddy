<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepos;
use App\Repository\CustomerClass;
use App\Repository\ProductRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    // admin's info - Pham Quang Hung
    public function adminConfirmUpdateInfo($username)
    {
        // get data from table "admin" in database and return index admin
        $user = AdminRepos::getAdminById($username);

        return view('admin.confirmInfo', [
            'user' => $user[0],
        ]);
    }

    // change admin's info anyway - Pham Quang Hung
    public function adminUpdateInfo(Request $request, $username)
    {
        // check username's url same as username's database
        if ($username != $request->input('username')) {
            return redirect()->action('adminController@productIndex');
        }
        // check username, contact, email not emty, email correct validate and confirm password for accept
        $this->validate($request,
            [
                'contact' => ['required'],
                'email' => ['required', 'email:rfc,dns'],
                'password' => ['required',
                    function($attribute, $value, $fails){
                        global $request;
                        $user = AdminRepos::getAdminById($request->input('username'));
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

    // index of customer - Pham Quang Hung
    protected function customerIndex(){
        $customers = CustomerClass::getAllCustomer();

        return view('customer.index',[
            'customers' => $customers
        ]);
    }

    // index of style - Bui Anh Tuan
    public function styleindex(){
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
    public  function styleshow($style){

        $style = AdminRepos::getstylebyid($style);
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
                    'styleID'=>'',
                    'style_name' => '',
                    'image' => '',
                    'description' => ''
                ],
            ]);

    }

    public function stylestore(Request $request)
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

    //edit style - Do Khac Duong
    public function styleEdit($styleID)
    {
        $style = AdminRepos::getstyleById($styleID);

        return view(
            'style.edit',
            [
                "style" => $style[0],

            ]);
    }

    //update style - Do Khac Duong
    public function styleUpdate(Request $request, $style)
    {
        if ($style != $request->input('styleID')) {
            return redirect()->action('adminController@styleindex');
        }

        $this->validate($request,
            [
                'style_name' => ['required'],
                'description' => ['required'],
            ],
            [
                'style_name.required' => 'Style name can not be empty',
                'description.required' => 'description can not be empty',
            ]
        );
        if($request->has('image')){
            $file = $request-> image;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images/style'), $file_name);
            $request->merge(['image' => $file_name]);
        }

        $style = (object)[
            'styleID' => $request->input('styleID'),
            'style_name' => $request->input('style_name'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
        ];

        if ($style->image === null){
            AdminRepos::updatestylewithoutimage($style);
        }else{
            AdminRepos::updatestylewithimage($style);
        }


        return redirect()->action('adminController@styleindex')
            ->with('msg', 'Update Successfully');
    }

    // delete style - Bui Anh Tuan
    public function styleConfirm($styleID){
        $style = AdminRepos::getStyleById($styleID);
        $styleHaveProduct = AdminRepos::getProductByStyleId($styleID);

        if ($style === []){
            return view('notFound');
        }

        return view('style.confirm',
            [
                'style' => $style[0],
                'product' => $styleHaveProduct,
            ]
        );
    }

    public function styleDestroy(Request $request, $styleID){
        if($styleID != $request->input('styleID')){
            return redirect()->action('adminController@styleindex');
        }

        AdminRepos::delete($styleID);

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
                'style_name.required' => 'Style name can not be empty',
                'image.required' => 'image can not be empty',
                'description.required' => 'description can not be empty',
            ]
        );
    }

    //product index by hoang

    public function productIndex()
    {
        $product = ProductRepos::getAllProduct();
        return view('product.index',
            [
                'product'=>$product
            ]);
    }
//    product show
    public function productShow($productID)
    {
        $product = ProductRepos::getProductById($productID);

        return view('product.show',
            [
                'product' => $product[0]
            ]
        );
    }
//  product create
    public function productCreate(){
        $style = ProductRepos::getAllStyle();
        return view('product.create', [
            'product'=> (object)[
                'productID' => '',
                'product_name' => '',
                'product_status' => '',
                'price' => '',
                'launch_date' => '',
                'image' => '',
                'material' => '',
                'size' => '',
                'color' => '',
                'description' => '',
            ],

            'style' => $style
        ]);
    }

    public function productStore(Request $request){


        $this->validate($request,
            [
                'product_name' => 'required',
                'image' => 'image',
                'product_status' => 'required',
                'price' => 'required',
                'launch_date' => 'required',
                'material' => 'required',
                'size' => 'required',
                'color' => 'required',
                'style' => 'gt:0',
                'description' => 'required'
            ],
            [
                'product_name.required' => 'Name can not be empty',
                'image.image' => 'The file under validation must be an image (jpg, jpeg, png, bmp, gif, svg, or webp).',
                'product_status.required' => 'Status not be empty (stock-in, stock-out)',
                'price.required' => 'Price can not be empty',
                'launch_date.required' => 'Launch date can not be empty',
                'material.required' => 'Material can not be empty',
                'size.required' => 'Size can not be empty',
                'color.required' => 'Color can not be empty',
                'style.gt' => 'Please select a Style!',
                'description.required' => 'Description can not be empty '
            ]
        );

        if($request->has('image')){
            $file = $request->image;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images/product'), $file_name);
            $request->merge(['image' => $file_name]);
        }

        $product = (object)[
            'product_name' => $request->input('product_name'),
            'image' => $request->input('image'),
            'product_status' => $request->input('product_status'),
            'price' => $request->input('price'),
            'launch_date' => $request->input('launch_date'),
            'material' => $request->input('material'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'styleID' => $request->input('style'),
            'description' => $request->input('description')
        ];
//        dd($product);
        $newId = ProductRepos::insert($product);


        return redirect()
            ->action('adminController@productIndex')
            ->with('msg', 'New Product with id: '.$newId.' has been inserted');
    }




    public function productEdit($productID){
        $product = ProductRepos::getProductById($productID);
        $style = ProductRepos::getAllStyle();
        return view('product.edit',[
                'product'=> $product[0],
                'style' => $style
        ]);
    }

    public function productUpdate(Request $request, $productID){
        if($productID !== $request->input('productID')){
            redirect()->action('adminController@productIndex');
        }
        $this->validate($request,
            [
                'product_name' => 'required',
                'image' => 'image',
                'product_status' => 'required',
                'price' => 'required',
                'launch_date' => 'required',
                'material' => 'required',
                'size' => 'required',
                'color' => 'required',
                'style' => 'gt:0',
                'description' => 'required'
            ],
            [
                'product_name.required' => 'Name can not be empty',
                'image.image' => 'The file under validation must be an image (jpg, jpeg, png, bmp, gif, svg, or webp).',
                'product_status.required' => 'Status not be empty (stock-in, stock-out)',
                'price.required' => 'Price can not be empty',
                'launch_date.required' => 'Launch date can not be empty',
                'material.required' => 'Material can not be empty',
                'size.required' => 'Size can not be empty',
                'color.required' => 'Color can not be empty',
                'style.gt' => 'Please select a Style!',
                'description.required' => 'Description can not be empty '
            ]
        );
        if($request->has('image')){
            $file = $request->image;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images/product'), $file_name);
            $request->merge(['image' => $file_name]);
        }

        $product = (object)[
            'productID' => $request->input('productID'),
            'product_name' => $request->input('product_name'),
            'image' => $request->input('image'),
            'product_status' => $request->input('product_status'),
            'price' => $request->input('price'),
            'launch_date' => $request->input('launch_date'),
            'material' => $request->input('material'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'styleID' => $request->input('style'),
            'description' => $request->input('description')
        ];
        if($product->image === null){
            ProductRepos::updateWithoutImage($product);
        }else{
            ProductRepos::updateWithImage($product);
        }

        return redirect()->action('adminController@productIndex')
            ->with('msg', 'Update Successfully');
    }

    public function productConfirm($productID){

        $product = ProductRepos::getProductById($productID);

        return view('product.confirm',
            [
                'product' => $product[0],
            ]
        );
    }

    public function productDestroy(Request $request, $productID){
        if($productID != $request->input('productID')){
            return redirect()->action('productController@productIndex');
        }


        ProductRepos::delete($productID);


        return redirect()
            ->action('adminController@productIndex')
            ->with('msg', 'Delete successfully');
    }

    public function feedback(){
        $feedback = AdminRepos::getAllFeedback();

        return view('admin.feedback',[
            'feedback' => $feedback
        ] );
    }


}
