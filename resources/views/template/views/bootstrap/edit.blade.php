@@extends('scaffold-interface.layouts.app')
@@section('title','Edit')
@@section('content')
<section class="content">
    <h1>Edit {{$parser->singular()}}</h1>
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn btn-danger'>{{$parser->singular()}} Index</button>
    </form>
    <br>
    <form method = 'POST' action = '@{!! url("{{$parser->singular()}}")!!}/@{!!${{$parser->singular()}}->id!!}/update'>
        <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
        @foreach($dataSystem->dataScaffold('v') as $value)
        <div class="form-group">
            <label for="{{$value}}">{{$value}}</label>
            <input id="{{$value}}" name = "{{$value}}" type="text" class="form-control" value="@{!!${{$parser->singular()}}->{{$value}}!!}">
        </div>
        @endforeach
        @foreach($dataSystem->getForeignKeys() as $key)
        <div class="form-group">
            <label>{{$key}} Select</label>
            <select name = '{{lcfirst(str_singular($key))}}_id' class = "form-control">
                @@foreach(${{str_plural($key)}} as $key => $value)
                <option value="@{{$key}}">@{{$value}}</option>
                @@endforeach
            </select>
        </div>
        @endforeach
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@@endsection
