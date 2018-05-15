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

Auth::routes();


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'DashboardController@index');

    /* All entities here */

    Route::resource('customers', 'CustomerController');
    Route::resource('tenants', 'TenantController');
    Route::resource('persons', 'PersonController');

    Route::get('/logout', 'LogoutController@index');
});
