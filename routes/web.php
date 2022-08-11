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
            'uses' => 'adminController@index',
            'as' => 'admin.index'
        ]);

        Route::post('update/{user_name}', [
            'uses' => 'adminController@adminUpdateInfo',
            'as' => 'admin.adminUpdateInfo'
        ]);

        Route::post('update/{user_name}', [
            'uses' => 'adminController@adminChangePassword',
            'as' => 'admin.adminChangePassword'
        ]);
    });
    Route::group(['prefix'=>'product'], function (){
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

Route::group(['prefix' => 'client'], function (){
    Route::get('', [
        'uses' => 'clientControllerWithRepos@index',
        'as' => 'client.index'
    ]);

    Route::get('shop/{offset}', [
        'uses' => 'clientControllerWithRepos@shop',
        'as' => 'client.shop'
    ]);

    Route::get('detail/{id}', [
        'uses' => 'clientControllerWithRepos@detail',
        'as' => 'client.detail'
    ]);

    Route::get('cart', [
        'uses' => 'clientControllerWithRepos@cart',
        'as' => 'client.cart'
    ]);

    Route::get('checkout', [
        'uses' => 'clientControllerWithRepos@checkout',
        'as' => 'client.checkout'
    ]);
    Route::post('search',[
        'uses' => 'clientControllerWithRepos@search',
        'as'  => 'client.search'
    ]);

    Route::get('viewcollor/{id}/{offset}',[
        'uses' => 'clientControllerWithRepos@viewcollor',
        'as' => 'client.viewcollor'
    ]);
    Route::get('style/{id}',[
        'uses' => 'clientControllerWithRepos@style',
        'as' => 'client.style'
    ]);
    Route::get('viewstyle/{id}/{offset}',[
        'uses' => 'clientControllerWithRepos@viewstyle',
        'as' => 'client.viewstyle'
    ]);

    Route::get('detail/{id}',[
        'uses' => 'clientControllerWithRepos@detail',
        'as' => 'client.detail'
    ]);
    Route::get('search',[
        'uses' => 'clientControllerWithRepos@search',
        'as' => 'client.search'
    ]);
    Route::get('login', [
        'uses' => 'clientControllerWithRepos@ask',
        'as' => 'client.ask'
    ]);
    Route::post('login', [
        'uses' => 'clientControllerWithRepos@login',
        'as' => 'client.login'
    ]);
    Route::get('signup',[
        'uses' => 'clientControllerWithRepos@signupcus',
        'as' => 'client.signupcus'
    ]);
    Route::post('signup',[
        'uses' => 'clientControllerWithRepos@storecus',
        'as' => 'client.storecus'
    ]);
    Route::get('signout', [
        'uses' => 'clientControllerWithRepos@signout',
        'as' => 'client.signout'
    ]);
    Route::post('download',[
        'uses' => 'clientControllerWithRepos@download',
        'as' => 'client.download'
    ]);
});
