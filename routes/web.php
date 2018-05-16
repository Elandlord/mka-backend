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
    Route::resource('modules', 'ModuleController');
    Route::resource('permissions', 'PermissionController');    
    Route::resource('persons', 'PersonController');
    Route::post('tenants/modules', 'TenantController@modules');
    Route::resource('tenants', 'TenantController');
    Route::resource('users', 'UserController');
    Route::post('users/permissions', 'UserController@permissions');

    Route::get('/logout', 'LogoutController@index');
});
