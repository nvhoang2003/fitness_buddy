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
                'retire_password' => ['required',
                    function($attribute, $value, $fails){
                        global $request;
                        if($value !== $request->input('new_password')){
                            $fails('Retire Password must same New Password');
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

        $this->formValidate($request)->validate();
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


        AdminRepos::updatestyle($style);

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

    public function productShow($productID)
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

    public function productCreate(){
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

    public function productStore(Request $request){

        $this->validate($request,
            [
                'product_name' => 'required',
                'image' => 'required, image',
                'product_status' => 'required',
                'price' => 'required',
                'launch_date' => 'required',
                'brand' => 'required',
                'material' => 'required',
                'size' => 'gt:0',
                'color' => 'gt:0',
                'style' => 'gt:0',
            ],
            [
                'product_name.required' => 'Name not be empty',
                'image.required' => 'Please choose your image !',
                'image.image' => 'The file under validation must be an image (jpg, jpeg, png, bmp, gif, svg, or webp).',
                'product_status.required' => 'Status not be empty (stock-in, stock-out)',
                'price.required' => 'Price not be empty',
                'launch_date.required' => 'Launch date not be empty',
                'brand.required' => 'Brand not be empty',
                'material.required' => 'Material not be empty',
                'size.gt' => 'Please select a Size!',
                'color.gt' => 'Please select a Color!',
                'style.gt' => 'Please select a Style!',
            ]
        );

        if($request->has('image')){
            $file = $request-> image;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('product'), $file_name);
            $request->merge(['product' => $file_name]);
        }
        $product = (object)[
            'product_name' => $request->input('name'),
            'image' => $request->input('image'),
            'product_status' => $request->input('product_status'),
            'price' => $request->input('price'),
            'launch_date' => $request->input('launch_date'),
            'brand' => $request->input('brand'),
            'material' => $request->input('material'),
            'sizeID' => $request->input('size'),
            'ColorID' => $request->input('color'),
            'SID' => $request->input('style'),
        ];

        $newId = ProductRepos::insert($product);


        return redirect()
            ->action('adminController@index')
            ->with('msg', 'New Product with id: '.$newId.' has been inserted');
    }




    public function productEdit($productID){
        $product = ProductRepos::getProductById($productID);
        $size = ProductRepos::getAllSize();
        $color = ProductRepos::getAllColor();
        $style = ProductRepos::getAllStyle();
        return view('product.edit',[
                'product'=> $product[0],
                'size'=> $size,
                'color' => $color,
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
                'brand' => 'required',
                'material' => 'required',
                'size' => 'gt:0',
                'color' => 'gt:0',
                'style' => 'gt:0',
            ],
            [
                'product_name.required' => 'Name not be empty',
                'image.image' => 'The file under validation must be an image (jpg, jpeg, png, bmp, gif, svg, or webp).',
                'product_status.required' => 'Status not be empty (stock-in, stock-out)',
                'price.required' => 'Price not be empty',
                'launch_date.required' => 'Launch date not be empty',
                'brand.required' => 'Brand not be empty',
                'material.required' => 'Material not be empty',
                'size.gt' => 'Please select a Size!',
                'color.gt' => 'Please select a Color!',
                'style.gt' => 'Please select a Style!',
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
            'brand' => $request->input('brand'),
            'material' => $request->input('material'),
            'sizeID' => $request->input('size'),
            'ColorID' => $request->input('color'),
            'SID' => $request->input('style'),
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
        $color = ProductRepos::getColorByProductId($productID);
        $size = ProductRepos::getSizeByProductId($productID);

        return view('product.confirm',
            [
                'product' => $product[0],
                'color' => $color[0],
                'size' => $size[0]
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


}
