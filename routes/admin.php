<?php

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
/*
Route::get('/admin', function () {
    return 'Hello Admin';
});*/

/*Route::namespace('Backend')->group(function (){

    Route::get('admins','Admin@showAdminName');
});*/

Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

    Route::get('show',function (){
        return 'This is user show page';
    });
});

Route::group(['namespace'=>'Backend'],function (){
    Route::get('/say','UsersController@sayHi');
    Route::get('/say1','UsersController@sayHi1');
});

Route::resource('news','NewsController');

Route::get('/index', 'NewsController@index');

Route::get('/landing', function (){
    return view('landing');
});

Route::get('/about', function (){
    return view('about');
});
