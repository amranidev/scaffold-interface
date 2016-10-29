//{{$parser->singular()}} Resources
/********************* {{$parser->singular()}} ***********************************************/
Route::resource('{{$parser->singular()}}','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller');
Route::post('{{$parser->singular()}}/{id}/update','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@update');
Route::get('{{$parser->singular()}}/{id}/delete','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@destroy');
Route::get('{{$parser->singular()}}/{id}/deleteMsg','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@DeleteMsg');
/********************* {{$parser->singular()}} ***********************************************/

