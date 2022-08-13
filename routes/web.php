<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//admin route
Route::group(['prefix' => 'ThriftFashion', 'middleware' => 'auth.admin'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/{username}',[
            'uses' => 'adminController@adminIndex',
            'as' => 'admin.adminIndex'
        ]);

        Route::get('updateInfo/{username}', [
            'uses' => 'adminController@adminConfirmUpdateInfo',
            'as' => 'admin.confirmUpdateInfo'
        ]);

        Route::get('updatePassword/{username}', [
            'uses' => 'adminController@adminConfirmChangePassword',
            'as' => 'admin.confirmChangePassword'
        ]);

        Route::post('updateInfo/{username}', [
            'uses' => 'adminController@adminUpdateInfo',
            'as' => 'admin.adminUpdateInfo'
        ]);

        Route::post('updatePassword/{username}', [
            'uses' => 'adminController@adminChangePassword',
            'as' => 'admin.adminChangePassword'
        ]);
    });
    Route::group(['prefix'=>'product'], function (){
        Route::get('',[
            'uses' => 'adminController@productIndex',
            'as' => 'product.index'
        ]);
        Route::get('show/{productID}',[
            'uses' => 'adminController@productShow',
            'as' => 'product.show'
        ]);


        Route::get('create',[
            'uses' =>'adminController@productCreate',
            'as' => 'product.create'
        ]);

        Route::post('create', [
            'uses' => 'adminController@productStore',
            'as' => 'product.store'
        ]);


        Route::get('update/{productID}',[
            'uses'=> 'adminController@productEdit',
            'as'=> 'product.edit'
        ]);

        Route::post('update/{productID}',[
            'uses'=> 'adminController@productUpdate',
            'as'=> 'product.update'
        ]);


        Route::get('delete/{productID}', [
            'uses' => 'adminController@productConfirm',
            'as' => 'product.confirm'
        ]);

        Route::post('delete/{productID}', [

            'uses' => 'adminController@productDestroy',
            'as' => 'product.destroy'

        ]);
    });

    Route::group(['prefix' => 'customer'], function (){
        Route::get('',[
            'uses' => 'adminController@customerIndex',
            'as' => 'customer.index'
        ]);
    });

    Route::group(['prefix' => 'style'], function (){
        Route::get('', [
            'uses' => 'adminController@styleindex',
            'as' => 'style.index'
        ]);
        Route::get('show/{styleID}',[
            'uses'=>'adminController@styleshow',
            'as' => 'style.show'
        ]);

        Route::get('create',[
            'uses' => 'adminController@stylecreate',
            'as' => 'style.create'
        ]);

        Route::post('create',[
            'uses' => 'adminController@stylestore',
            'as' => 'style.store'
        ]);

        Route::get('update/{styleID}',[
            'uses' => 'adminController@styleEdit',
            'as' => 'style.edit'
        ]);
        Route::post('update/{styleID}',[
            'uses' => 'adminController@styleUpdate',
            'as' => 'style.update'
        ]);


        Route::get('delete/{styleID}', [
            'uses' => 'adminController@styleConfirm',
            'as' => 'style.confirm'
        ]);

        Route::post('delete/{styleID}', [
            'uses' => 'adminController@styleDestroy',
            'as' => 'style.destroy'
        ]);
    });
});
//signin, signup, signout route
Route::group(['prefix' => 'auth'], function(){
    Route::get('login',[
        'uses' => 'manualController@ask',
        'as' => 'auth.ask'
    ]);

    Route::post('login',[
        'uses' => 'manualController@signin',
        'as' => 'auth.signin'
    ]);

    Route::get('logout', [
        'uses' => 'manualController@signout',
        'as' => 'auth.signout'
    ]);

    Route::get('signin', [
        'uses' => 'manualController@customerAsk',
        'as' => 'auth.customerAsk'
    ]);

    Route::post('signin', [
        'uses' => 'manualController@customerSignin',
        'as' => 'auth.customerSignin'
    ]);

    Route::get('signup',[
        'uses' => 'manualController@customerFormSignup',
        'as' => 'auth.customerFormSignup',
    ]);

    Route::post('signup',[
        'uses' => 'manualController@customerSignup',
        'as' => 'auth.customerSignup',
    ]);

    Route::get('signout',[
        'uses' => 'manualController@customerSignout',
        'as' => 'auth.customerSignout',
    ]);

});
//client routes
Route::group(['prefix' => 'client'], function (){
    Route::get('homepage', [
        'uses' => 'clientControllerWithRepos@homepage',
        'as' => 'client.homepage'
    ]);

    Route::get('shop',[
        'uses' =>'clientControllerWithRepos@shop',
        'as' => 'client.shop'
    ]);

    Route::get('updateInfo/{username}', [
        'uses' => 'clientControllerWithRepos@confirmUpdateInfo',
        'as' => 'client.updateInfo'
    ]);

    Route::get('updatePassword/{username}', [
        'uses' => 'clientControllerWithRepos@confirmChangePassword',
        'as' => 'client.changePassword'
    ]);

    Route::get('style/{styleID}', [
        'uses' => 'clientControllerWithRepos@style',
        'as' => 'client.style'
    ]);

    Route::get('size/{sizeID}',[
       'uses' =>'clientControllerWithRepos@size',
       'as' => 'client.size'
    ]);

    Route::get('price/{price}', [
        'uses' => 'clientControllerWithRepos@price',
        'as' => 'client.price'
    ]);

    Route::get('details/{productID}',[
        'uses' =>'clientControllerWithRepos@details',
        'as' => 'client.details'
    ]);

    Route::get('/{productID}',[
        'uses' =>'clientControllerWithRepos@details',
        'as' => 'client.search'
    ]);

    Route::get('cart', [
        'uses' => 'clientControllerWithRepos@cart',
        'as' => 'client.cart'
    ]);
});
