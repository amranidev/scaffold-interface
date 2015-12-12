<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show {{$names->TableName()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show {{$names->TableName()}}</h1>
            <form method = 'get' action = '{{$names->standardApi()}}'>
                <button class = 'btn blue'>{{$names->TableName()}} Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    @foreach($dataSystem->dataScaffold('v') as $value)

                    <tr>
                        <td>
                            <b><i>{{$value}} : </i></b>
                        </td>
                        <td>{{$names->open()}}${{$names->TableNameSingle()}}->{{$value}}{{$names->close()}}</td>
                    </tr>
                    @endforeach


                        @if($dataSystem->relationAttr != null)
                        @foreach($dataSystem->relationAttr as $key=>$value)

                        @foreach($value as $key1 => $value1)

                        <tr>
                        <td>
                            <b><i>{{$value1}} : </i><b>
                        </td>
                        <td>{{$names->open()}}${{$names->TableNameSingle()}}->{{str_singular($key)}}->{{$value1}}{{$names->close()}}</td>
                        </tr>
                        @endforeach

                        @endforeach

                        @endif

                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
