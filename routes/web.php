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
//トップ画面を表示
//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('/', 'top');


//会員登録画面
Route::get('/member', "MemberController@register")->name("member.register");
Route::post('/member/post', "MemberController@post")->name("member.post");
//会員確認画面
Route::get('/member/confirm', "MemberController@confirm")->name("member.confirm");
Route::post('/member/store', "MemberController@store")->name("member.store");
//会員完了画面
Route::get('/member/complete', "MemberController@complete")->name("member.complete");

//Route::get('/home', "HomeController@index")->name("home");


//ログイン
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');



//認証
//Route::get('hello/auth', 'HelloController@getAuth');
//Route::post('hello/auth', 'HelloController@postAuth');
