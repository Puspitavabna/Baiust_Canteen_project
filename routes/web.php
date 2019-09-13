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
    return redirect(route('user.sign_in'));
});

Route::get('/user/forgot_password', [
    'uses' => 'UserController@forgotPassword',
    'as' => 'user.forgot_password'
]);

Route::get('/user/sign_in', [
    'uses' => 'UserController@getLogin',
    'as' => 'user.sign_in'
]);

Route::post('/user/sign_in', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.post.sign_in'
]);

Route::get('/user/sign_up', [
    'uses' => 'UserController@beforeGetRegister',
    'as' => 'user.sign_up'
]);
Route::post('/user/sign_up/', [
    'uses' => 'UserController@postRegister',
    'as' => 'user.post.register'
]);

// Admin session

Route::group(['middleware' => 'auth' , 'prefix' => 'admin'] , function() {
    Route::get('/' , [
        'uses' => 'Admin\AdminController@index',
        'as' => 'admin.index'
    ]);
    Route::post('/logout' , [
        'uses' => 'Admin\AdminController@getLogout',
        'as' => 'admin.logout'
    ]);

    Route::get('/meal_report' , [
        'uses' => 'Admin\AdminMealReportController@index',
        'as' => 'admin.meal_report.index'
    ]);

    Route::get('/menu' , [
        'uses' => 'Admin\AdminMealOrderController@menu',
        'as' => 'admin.menu.index'
    ]);

    Route::resource('meal_order', 'Admin\AdminMealOrderController', ['as' => 'admin']);

    Route::resource('meal_payment', 'Admin\AdminMealPaymentController', ['as' => 'admin']);
});