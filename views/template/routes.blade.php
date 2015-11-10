//{{$TableName}} Resources
/*******************************************************/
Route::resource('{{$TableNameSingle}}','{{$TableName}}Controller');
Route::post('{{$TableNameSingle}}/{id}/update','{{$TableName}}Controller@update');
Route::get('{{$TableNameSingle}}/{id}/delete','{{$TableName}}Controller@destroy');
/********************************************************/
