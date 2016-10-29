<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta e="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show {{$parser->singular()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show {{$parser->singular()}}</h1>
            <br>
            <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
                <button class = 'btn btn-primary'>{{$parser->singular()}} Index</button>
            </form>
            <br>
            <table class = 'table table-bordered'>
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
                        <td>@{!!${{$parser->singular()}}->{{$value}}!!}</td>
                    </tr>
                    @endforeach


                        @if($dataSystem->getRelationAttributes() != null)
                        @foreach($dataSystem->getRelationAttributes() as $key=>$value)

                        @foreach($value as $key1 => $value1)

                        <tr>
                        <td>
                            <b><i>{{$value1}} : </i><b>
                        </td>
                        <td>@{!!${{$parser->singular()}}->{{str_singular($key)}}->{{$value1}}!!}</td>
                        </tr>
                        @endforeach

                        @endforeach

                        @endif

                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
