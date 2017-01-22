<?php

/*
|--------------------------------------------------------------------------
| Where the main app (ScaffoldInterface) routes
|--------------------------------------------------------------------------
|
 */
Route::group(['middleware' => 'web'], function () {
    Route::get('scaffold', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@index');

    Route::post('scaffold/guipost', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@store');

    Route::get('scaffold/guirollback/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@destroy');

    Route::get('scaffold/guidelete/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@deleteMsg');

    Route::get('scaffold/getAttributes/{table}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@getResult');

    Route::get('scaffold/migrate', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@migrate');

    Route::get('scaffold/rollback', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@rollback');

    Route::get('scaffold/manyToManyForm', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@manyToManyForm');

    Route::post('scaffold/manyToMany', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@manyToMany');

    Route::get('scaffold/graph', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@graph');
});

/*
|------------------------------------------------------------------------------
| Where user managment system routes (User-Role-Permission)
|------------------------------------------------------------------------------
|
 */
Route::group(['middleware' => ['web', 'auth']], function () {
    // you can change anything you want.
    //Dashboard
    Route::get('dashboard', '\App\Http\Controllers\ScaffoldInterface\AppController@dashboard');

    //Users
    Route::get('users', '\App\Http\Controllers\ScaffoldInterface\UserController@index');
    Route::get('users/edit/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@edit');
    Route::post('users/update', '\App\Http\Controllers\ScaffoldInterface\UserController@update');
    Route::get('users/create', '\App\Http\Controllers\ScaffoldInterface\UserController@create');
    Route::post('users/store', '\App\Http\Controllers\ScaffoldInterface\UserController@store');
    Route::get('users/delete/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@destroy');
    Route::post('users/addRole', '\App\Http\Controllers\ScaffoldInterface\UserController@addRole');
    Route::post('users/addPermission', '\App\Http\Controllers\ScaffoldInterface\UserController@addPermission');
    Route::get('users/removePermission/{permission}/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@revokePermission');
    Route::get('users/removeRole/{role}/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@revokeRole');

    //Roles
    Route::get('roles', '\App\Http\Controllers\ScaffoldInterface\RoleController@index');
    Route::get('roles/edit/{role_id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@edit');
    Route::post('roles/update', '\App\Http\Controllers\ScaffoldInterface\RoleController@update');
    Route::get('roles/create', '\App\Http\Controllers\ScaffoldInterface\RoleController@create');
    Route::post('roles/store', '\App\Http\Controllers\ScaffoldInterface\RoleController@store');
    Route::get('roles/delete/{role_id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@destroy');

    //Permissions
    Route::get('permissions', '\App\Http\Controllers\ScaffoldInterface\PermissionController@index');
    Route::get('permissions/edit/{role_id}', '\App\Http\Controllers\ScaffoldInterface\PermissionController@edit');
    Route::post('permissions/update', '\App\Http\Controllers\ScaffoldInterface\PermissionController@update');
    Route::get('permissions/create', '\App\Http\Controllers\ScaffoldInterface\PermissionController@create');
    Route::post('permissions/store', '\App\Http\Controllers\ScaffoldInterface\PermissionController@store');
    Route::get('permissions/delete/{role_id}', '\App\Http\Controllers\ScaffoldInterface\PermissionController@destroy');
});
