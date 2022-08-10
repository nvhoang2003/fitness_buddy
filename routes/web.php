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
        Route::get('',[
            'uses' => 'adminController@index',
            'as' => 'admin.index'
        ]);

//        Route::get('show/{user_name}', [
//            'uses' => 'adminControllerWithRepos@show',
//            'as' => 'admin.show'
//        ]);
//
//        Route::get('update/{user_name}',[
//            'uses' => 'adminControllerWithRepos@edit',
//            'as' => 'admin.edit'
//        ]);
//
//        Route::post('update/{user_name}', [
//            'uses' => 'adminControllerWithRepos@update',
//            'as' => 'admin.update'
//        ]);
    });
    Route::group(['prefix'=>'product'], function (){

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
