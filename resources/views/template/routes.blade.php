//{{$names->tableNameSingle()}} Resources
/********************* {{$names->tableNameSingle()}} ***********************************************/
Route::resource('{{$names->tableNameSingle()}}','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->tableName()}}Controller');
Route::post('{{$names->tableNameSingle()}}/{id}/update','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->tableName()}}Controller@update');
Route::get('{{$names->tableNameSingle()}}/{id}/delete','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->tableName()}}Controller@destroy');
Route::get('{{$names->tableNameSingle()}}/{id}/deleteMsg','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{$names->tableName()}}Controller@DeleteMsg');
/********************* {{$names->tableNameSingle()}} ***********************************************/

