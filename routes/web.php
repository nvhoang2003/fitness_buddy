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
            'as' => 'admin.adminConfirmUpdateInfo'
        ]);

        Route::get('updatePassword/{username}', [
            'uses' => 'adminController@adminConfirmChangePassword',
            'as' => 'admin.adminConfirmChangePassword'
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
            'uses' => 'adminController@show',
            'as' => 'product.show'
        ]);


        Route::get('create',[
            'uses' =>'adminController@create',
            'as' => 'product.create'
        ]);

        Route::post('create', [
            'uses' => 'adminController@store',
            'as' => 'product.store'
        ]);



        Route::get('update',[
            'uses'=> 'adminController@edit',
            'as'=> 'product.edit'
        ]);

        Route::get('delete/{productID}', [
            'uses' => 'adminController@confirm',
            'as' => 'product.confirm_product'
        ]);

        Route::post('delete/{productID}', [
            'uses' => 'adminCOntroller@destroy',
            'as' => 'product.destroy_product'
        ]);
    });
//

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

Route::group(['prefix' => 'viewC1'], function (){
    Route::get('', [
        'uses' => 'ViewC1Controller@index',
        'as' => 'viewC1.index'
    ]);

    Route::get('shop/{offset}', [
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







