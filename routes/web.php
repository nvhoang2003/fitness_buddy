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
    'uses' =>'clientControllerWithReposWithRepos@shop',
    'as' => 'client.shop'
]);
Route::get('details/{productID}',[
    'uses' =>'clientControllerWithReposWithRepos@detail',
    'as' => 'client.details'
]);


Route::group(['prefix' => 'client'], function (){
    Route::get('', [
        'uses' => 'clientControllerWithRepos@homepage',
        'as' => 'client.homepage'
    ]);
//    /{offset}
    Route::get('shop', [
        'uses' => 'clientControllerWithRepos@shop',
        'as' => 'client.shop'
    ]);

    Route::get('details/{productID}',[
        'uses' =>'clientControllerWithReposWithRepos@detail',
        'as' => 'client.details'
    ]);

    Route::get('cart', [
        'uses' => 'clientControllerWithRepos@cart',
        'as' => 'client.cart'
    ]);

    Route::get('checkout', [
        'uses' => 'clientControllerWithReposs@checkout',
        'as' => 'client.checkout'
    ]);
    Route::post('search',[
        'uses' => 'clientControllerWithRepos@search',
        'as'  => 'client.search'
    ]);

    Route::get('viewproduct/{id}/{offset}',[
        'uses' => 'clientControllerWithRepos@viewproduct',
        'as' => 'client.viewproduct'
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
        'uses' => 'clientControllerWithReposWithRepos@ask',
        'as' => 'client.ask'
    ]);
    Route::post('login', [
        'uses' => 'clientControllerWithReposWithRepos@login',
        'as' => 'client.login'
    ]);
    Route::get('signup',[
        'uses' => 'clientControllerWithReposWithRepos@signupcus',
        'as' => 'client.signupcus'
    ]);
    Route::post('signup',[
        'uses' => 'clientControllerWithReposWithRepos@storecus',
        'as' => 'client.storecus'
    ]);
    Route::get('signout', [
        'uses' => 'clientControllerWithReposWithRepos@signout',
        'as' => 'client.signout'
    ]);
    Route::post('download',[
        'uses' => 'clientControllerWithReposWithRepos@download',
        'as' => 'client.download'
    ]);
});
