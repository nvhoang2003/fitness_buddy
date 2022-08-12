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

Route::group(['prefix' => 'ThriftFashion'], function() {
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
            'uses' => 'adminController@productindex',
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
            'as' => 'style.shows'
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

    Route::get('delete/{style_id}', [
        'uses' => 'adminController@confirm',
        'as' => 'style.confirm'
    ]);

    Route::post('delete/{style_id}', [
        'uses' => 'adminController@destroy',
        'as' => 'style.destroy'
    ]);
});

Route::group(['prefix' => 'style/index'], function (){
    Route::get('', [
        'uses' => 'adminController@styleindex',
        'as' => 'style.index'
    ]);
    Route::get('showstyle/{id}',[
        'uses'=>'adminController@styleshow',
        'as' => 'style.shows'
    ]);

    Route::get('createstyle',[
        'uses' => 'adminController@stylecreate',
        'as' => 'style.create'
    ]);

    Route::post('createstyle',[
        'uses' => 'adminController@stylestore',
        'as' => 'admin.storestylist'
    ]);

    Route::get('updatestyle/{id}',[
        'uses' => 'adminController@edit',
        'as' => 'admin.editstyle'
    ]);
    Route::post('updatesyle/{id}',[
        'uses' => 'adminController@update',
        'as' => 'admin.updatestyle'
    ]);


    Route::get('delete/{style_id}', [
        'uses' => 'adminController@confirm',
        'as' => 'style.confirm'
    ]);

    Route::post('delete/{style_id}', [
        'uses' => 'adminController@destroy',
        'as' => 'style.destroy'
    ]);
});

Route::get('shop',[
    'uses' =>'clientControllerWithRepos@shop',
    'as' => 'client.shop'
]);
Route::get('details/{productID}',[
    'uses' =>'clientControllerWithRepos@detail',
    'as' => 'client.details'
]);


Route::group(['prefix' => 'viewC1'], function (){
    Route::get('', [
        'uses' => 'ViewC1Controller@index',
        'as' => 'viewC1.index'
    ]);
//    /{offset}
    Route::get('shop', [
        'uses' => 'ViewC1Controller@shop',
        'as' => 'viewC1.shop'
    ]);

    Route::get('details/{id}', [
        'uses' => 'ViewC1Controller@detail',
        'as' => 'viewC1.details'
    ]);

    Route::get('cart', [
        'uses' => 'ViewC1Controller@cart',
        'as' => 'viewC1.cart'
    ]);

    Route::get('checkout', [
        'uses' => 'ViewC1Controllers@checkout',
        'as' => 'viewC1.checkout'
    ]);
    Route::post('search',[
        'uses' => 'ViewC1Controller@search',
        'as'  => 'viewC1.search'
    ]);

    Route::get('viewproduct/{id}/{offset}',[
        'uses' => 'ViewC1Controller@viewproduct',
        'as' => 'viewC1.viewproduct'
    ]);
    Route::get('style/{id}',[
        'uses' => 'ViewC1Controller@style',
        'as' => 'viewC1.style'
    ]);
    Route::get('viewstyle/{id}/{offset}',[
        'uses' => 'ViewC1Controller@viewstyle',
        'as' => 'viewC1.viewstyle'
    ]);

    Route::get('detail/{id}',[
        'uses' => 'ViewC1Controller@detail',
        'as' => 'viewC1.detail'
    ]);
    Route::get('search',[
        'uses' => 'ViewC1Controller@search',
        'as' => 'viewC1.search'
    ]);
    Route::get('login', [
        'uses' => 'ViewC1ControllerWithRepos@ask',
        'as' => 'viewC1.ask'
    ]);
    Route::post('login', [
        'uses' => 'ViewC1ControllerWithRepos@login',
        'as' => 'viewC1.login'
    ]);
    Route::get('signup',[
        'uses' => 'ViewC1ControllerWithRepos@signupcus',
        'as' => 'viewC1.signupcus'
    ]);
    Route::post('signup',[
        'uses' => 'ViewC1ControllerWithRepos@storecus',
        'as' => 'viewC1.storecus'
    ]);
    Route::get('signout', [
        'uses' => 'ViewC1ControllerWithRepos@signout',
        'as' => 'viewC1.signout'
    ]);
    Route::post('download',[
        'uses' => 'ViewC1ControllerWithRepos@download',
        'as' => 'viewC1.download'
    ]);
});
