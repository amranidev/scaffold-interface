<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index {{$TableName}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>{{$TableName}} Index</h1>
            <form method = 'get' action = '{{$standardApi}}/create'>
                <button class = 'btn red' type = 'submit'>Create New {{$TableName}}</button>
            </form>
            <br>
            <table>
                <thead>
                    @foreach($request as $value)

                    <th>{{$value}}</th>
                    @endforeach

                    <th>actions</th>
                </thead>
                <tbody>
                    {{$foreach}}

                    <tr>
                        @foreach($request as $value)

                        <td>{{$open}}$value->{{$value}}{{$close}}</td>
                        @endforeach

                        <td>
                        <div class = 'row'>
                            <form method = 'get' class = 'col s12 m4 l2' action = '{{$standardApi}}/{{$open}}$value->id{{$close}}/delete'><button class = 'btn-floating red'><i class = 'material-icons'>delete</i></button></form>
                            <form method = 'get' class = 'col s12 m4 l2' action = '{{$standardApi}}/{{$open}}$value->id{{$close}}/edit'><button type = 'submit' class = 'btn-floating blue'><i class = 'material-icons'>edit</i></button></form>
                            <form method = 'get' class = 'col s12 m4 l2' action = '{{$standardApi}}/{{$open}}$value->id{{$close}}'><button type = 'submit' class = 'btn-floating orange'><i class = 'material-icons'>info</i></button></form>
                        </div>
                        </td>

                    </tr>
                    {{$endforeach}}

                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
