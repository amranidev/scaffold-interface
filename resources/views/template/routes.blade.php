//{{$names->TableNameSingle()}} Resources
/********************* {{$names->TableNameSingle()}} ***********************************************/
Route::resource('{{$names->TableNameSingle()}}','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->TableName()}}Controller');
Route::post('{{$names->TableNameSingle()}}/{id}/update','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->TableName()}}Controller@update');
Route::get('{{$names->TableNameSingle()}}/{id}/delete','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->TableName()}}Controller@destroy');
Route::get('{{$names->TableNameSingle()}}/{id}/deleteMsg','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->TableName()}}Controller@DeleteMsg');
/********************* {{$names->TableNameSingle()}} ***********************************************/

