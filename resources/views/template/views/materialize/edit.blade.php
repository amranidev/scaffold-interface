<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit {{$names->TableName()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit {{$names->TableName()}}</h1>
            <form method = 'get' action = '{{$names->standardApi()}}'>
                <button class = 'btn blue'>{{$names->TableName()}} Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{$names->standardApi()}}/{{$names->open()}}${{$names->TableNameSingle()}}->id{{$names->close()}}/update'>
                <input type = 'hidden' name = '_token' value = '{{$names->open()}}Session::token(){{$names->close()}}'>
                @foreach($dataSystem->dataScaffold('v') as $value)

                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="text" class="validate" value="{{$names->open()}}${{$names->TableNameSingle()}}->{{$value}}{{$names->close()}}">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
                @endforeach
                @foreach($dataSystem->foreignKeys as $key)

                <div class="input-field col s12">
                    <select name = '{{lcfirst(str_singular($key))}}_id'>
                        {{$names->blade()}}foreach(${{str_plural($key)}} as $key1 => $value1)
                        <option value="@{{$key1}}">@{{$value1}}</option>
                        {{$names->blade()}}endforeach
                    </select>
                    <label>{{$key}} Select</label>
                </div>
                @endforeach

                <button class = 'btn red' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script type="text/javascript">
    $('select').material_select();
    </script>
</html>
