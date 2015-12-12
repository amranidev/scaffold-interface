//{{$names->TableName()}} Resources
/*******************************************************/
Route::resource('{{$names->TableNameSingle()}}','{{$names->TableName()}}Controller');
Route::post('{{$names->TableNameSingle()}}/{id}/update','{{$names->TableName()}}Controller@update');
Route::get('{{$names->TableNameSingle()}}/{id}/delete','{{$names->TableName()}}Controller@destroy');
Route::get('{{$names->TableNameSingle()}}/{id}/deleteMsg','{{$names->TableName()}}Controller@DeleteMsg');
/********************************************************/
