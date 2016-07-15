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

    Route::get('scaffold/scaffoldHomePage', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@homePage');

    Route::get('scaffold/scaffoldHomePageIndex', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@getIndex');

    Route::get('scaffold/scaffoldHomePageDelete', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@homePageDelete');

    Route::get('scaffold/migrate', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@migrate');

    Route::get('scaffold/rollback', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@rollback');
});
