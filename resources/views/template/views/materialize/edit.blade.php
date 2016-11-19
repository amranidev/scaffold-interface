@@extends('scaffold-interface.layouts.defaultMaterialize')
@@section('title','Edit')
@@section('content')
<div class = 'container'>
    <h1>Edit {{$parser->singular()}}</h1>
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn blue'>{{$parser->singular()}} Index</button>
    </form>
    <br>
    <form method = 'POST' action = '@{!! url("{{$parser->singular()}}")!!}/@{!!${{$parser->singular()}}->id!!}/update'>
        <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
        @foreach($dataSystem->dataScaffold('v') as $value)
        <div class="input-field col s6">
            <input id="{{$value}}" name = "{{$value}}" type="text" class="validate" value="@{!!${{$parser->singular()}}->{{$value}}!!}">
            <label for="{{$value}}">{{$value}}</label>
        </div>
        @endforeach
        @foreach($dataSystem->getForeignKeys() as $key)
        <div class="input-field col s12">
            <select name = '{{lcfirst(str_singular($key))}}_id'>
                @@foreach(${{str_plural($key)}} as $key => $value)
                <option value="@{{$key}}">@{{$value}}</option>
                @@endforeach
            </select>
            <label>{{$key}} Select</label>
        </div>
        @endforeach
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@@endsection
