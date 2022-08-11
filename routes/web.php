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
});

Route::group(['prefix' => 'style/index'], function (){
    Route::get('', [
        'uses' => 'adminController@styleindex',
        'as' => 'style.index'
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
