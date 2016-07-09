<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create {{$names->tableName()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create {{$names->tableName()}}</h1>
            <form method = 'get' action = '{{$names->open()}}url("{{$names->standardApi()}}"){{$names->close()}}'>
                <button class = 'btn btn-danger'>{{$names->tableName()}} Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{$names->open()}}url("{{$names->standardApi()}}"){{$names->close()}}'>
                <input type = 'hidden' name = '_token' value = '{{$names->open()}}Session::token(){{$names->close()}}'>
                @foreach($dataSystem->dataScaffold('v') as $value)

                <div class="form-group">
                    <label for="{{$value}}">{{$value}}</label>
                    <input id="{{$value}}" name = "{{$value}}" type="text" class="form-control">
                </div>
                @endforeach

                @foreach($dataSystem->getForeignKeys() as $key)

                <div class="form-group">
                    <label>{{$key}} Select</label>
                    <select name = '{{lcfirst(str_singular($key))}}_id' class = 'form-control'>
                        {{$names->blade()}}foreach(${{str_plural($key)}} as $key => $value)
                        <option value="@{{$key}}">@{{$value}}</option>
                        {{$names->blade()}}endforeach
                    </select>
                </div>
                @endforeach

                <button class = 'btn btn-primary' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
