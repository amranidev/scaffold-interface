<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index {{$names->TableName()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>{{$names->TableName()}} Index</h1>
            <div class="row">
            <form class = 'col s3' method = 'get' action = '{{$names->standardApi()}}/create'>
                <button class = 'btn red' type = 'submit'>Create New {{$names->TableName()}}</button>
            </form>
            @if($dataSystem->relationAttr != null)

                <ul id="dropdown" class="dropdown-content">
            @foreach($dataSystem->relationAttr as $key => $value)

                    <li><a href="{{URL::to('/')}}/{{lcfirst(str_singular($key))}}">{{ucfirst(str_singular($key))}}</a></li>
            @endforeach

                </ul>
                <a class="col s3 btn dropdown-button #1e88e5 blue darken-1" href="#!" data-activates="dropdown">Associate<i class="mdi-navigation-arrow-drop-down right"></i></a>
            @endif
            </div>
            <table>
                <thead>
                    @foreach($dataSystem->dataScaffold('v') as $value)

                    <th>{{$value}}</th>
                    @endforeach

                    @if($dataSystem->relationAttr != null)

                    @foreach($dataSystem->relationAttr as $key => $value)

                    @foreach($value as $key1 => $value1)

                    <th>{{$value1}}</th>
                    @endforeach

                    @endforeach

                    @endif

                    <th>actions</th>
                </thead>
                <tbody>
                    {{$names->foreachh()}}

                    <tr>
                        @foreach($dataSystem->dataScaffold('v') as $value)

                        <td>{{$names->open()}}$value->{{$value}}{{$names->close()}}</td>
                        @endforeach

                        @if($dataSystem->relationAttr != null)

                        @foreach($dataSystem->relationAttr as $key=>$value)

                        @foreach($value as $key1 => $value1)

                        <td>{{$names->open()}}$value->{{str_singular($key)}}->{{$value1}}{{$names->close()}}</td>
                        @endforeach

                        @endforeach

                        @endif

                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/{{$names->TableNameSingle()}}/{{$names->open()}}$value->id{{$names->close()}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/{{$names->TableNameSingle()}}/{{$names->open()}}$value->id{{$names->close()}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/{{$names->TableNameSingle()}}/{{$names->open()}}$value->id{{$names->close()}}'><i class = 'material-icons'>info</i></a>
                            </div>
                        </td>
                    </tr>
                    {{$names->endforeachh()}}
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
    <script> var baseURL = "{{$names->open()}}URL::to('/'){{$names->close()}}"</script>
    <script type="text/javascript" src = "/js/AjaxisMaterialize.js"></script>
    <script type="text/javascript" src = "/js/scaffold-interface-js/customA.js"></script>
</html>
