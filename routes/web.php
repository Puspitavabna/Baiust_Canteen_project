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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users/forgot_password', [
    'uses' => 'UserController@forgotPassword',
    'as' => 'user.forgot_password'
]);

Route::get('/users/sign_in', [
    'uses' => 'UserController@getLogin',
    'as' => 'login'
]);

Route::post('/users/sign_in', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.sign_in'
]);

Route::get('/users/sign_up', [
    'uses' => 'UserController@beforeGetRegister',
    'as' => 'user.sign_up'
]);
Route::get('user/sign_up/type/{name}', 'UserController@getRegister');
Route::post('/users/sign_up/type/', [
    'uses' => 'UserController@postRegister',
    'as' => 'user.client.signup'
]);
