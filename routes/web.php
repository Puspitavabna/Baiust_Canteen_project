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
    Route::get('/admin_report' , [
        'uses' => 'Admin\AdminController@report',
        'as' => 'admin.report.index'
    ]);
//    Route::get('/meal_order/index', [
//        'uses' => 'Admin\AdminMealOrderController@index',
//        'as' => 'admin.meal_order.store'
//    ]);
////    Route::post('/meal_order/store', [
////        'uses' => 'Admin\AdminMealOrderController@store',
////        'as' => 'admin.meal_order.store'
////    ]);
///
//    Route::post('/meal_order/store', [
//        'uses' => 'Admin\AdminMealOrderController@store',
//        'as' => 'admin.meal_order.store'
//    ]);
//    Route::get('/meal_order', [
//        'uses' => 'Admin\AdminMealOrderController@index',
//        'as' => 'admin.meal_order.index'
//    ]);
//    Route::get('/meal_order/create', [
//        'uses' => 'Admin\AdminMealOrderController@create',
//        'as' => 'admin.meal_order.create'
//    ]);
    Route::resource('meal_order', 'Admin\AdminMealOrderController', ['as' => 'admin']);


});