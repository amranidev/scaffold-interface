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

                    @if($relationAttr != null)

                    @foreach($relationAttr as $key => $value)

                    @foreach($value as $key1 => $value1)

                    <th>{{$value1}}</th>
                    @endforeach

                    @endforeach

                    @endif

                    <th>actions</th>
                </thead>
                <tbody>
                    {{$foreach}}

                    <tr>
                        @foreach($request as $value)

                        <td>{{$open}}$value->{{$value}}{{$close}}</td>
                        @endforeach

                        @if($relationAttr != null)

                        @foreach($relationAttr as $key=>$value)

                        @foreach($value as $key1 => $value1)

                        <td>{{$open}}$value->{{str_singular($key)}}->{{$value1}}{{$close}}</td>
                        @endforeach

                        @endforeach

                        @endif

                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/{{$TableNameSingle}}/{{$open}}$value->id{{$close}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/{{$TableNameSingle}}/{{$open}}$value->id{{$close}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/{{$TableNameSingle}}/{{$open}}$value->id{{$close}}'><i class = 'material-icons'>info</i></a>
                            </div>
                        </td>
                    </tr>
                    {{$endforeach}}
                </tbody>
            </table>
        </div>
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script> var baseURL = "{{$open}}URL::to('/'){{$close}}"</script>
    <script type="text/javascript" src = "/js/AjaxisMaterialize.js"></script>
    <script type="text/javascript" src = "/js/customA.js"></script>
</html>
