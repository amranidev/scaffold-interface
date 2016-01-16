<?php
/*
|--------------------------------------------------------------------------
| Where the main app (ScaffoldInterface) routes
|--------------------------------------------------------------------------
|
 */
Route::get('scaffold', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@index');
Route::post('scaffold/guipost', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@store');
Route::get('scaffold/guirollback/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@destroy');
Route::get('scaffold/guidelete/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@deleteMsg');
Route::get('scaffold/getAttributes/{table}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@GetResult');
