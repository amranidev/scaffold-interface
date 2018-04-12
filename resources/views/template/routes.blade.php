//{{$parser->singular()}} Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('@if(config('amranidev.config.prefixRoutes')){{config('amranidev.config.prefixRoutes')}}/@endif{{$parser->singular()}}','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller');
  Route::post('@if(config('amranidev.config.prefixRoutes')){{config('amranidev.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/update','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@update');
  Route::get('@if(config('amranidev.config.prefixRoutes')){{config('amranidev.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/delete','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@destroy');
  Route::get('@if(config('amranidev.config.prefixRoutes')){{config('amranidev.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/deleteMsg','@if(config('amranidev.config.controllerNameSpace'))\{{config('amranidev.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@DeleteMsg');
});
