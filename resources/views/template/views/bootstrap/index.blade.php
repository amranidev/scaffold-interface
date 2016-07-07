<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index {{$names->tableName()}}</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>{{$names->tableName()}} Index</h1>
            <form class = 'col s3' method = 'get' action = '{{$names->standardApi()}}/create'>
                <button class = 'btn btn-primary' type = 'submit'>Create New {{$names->tableName()}}</button>
            </form>
            <br>
            @if($dataSystem->getRelationAttributes() != null)

            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Associate
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($dataSystem->getRelationAttributes() as $key => $value)

                    <li><a href="{{URL::to('/')}}/{{lcfirst(str_singular($key))}}">{{ucfirst(str_singular($key))}}</a></li>
                    @endforeach

                </ul>
            </div>
            @endif

            <br>
            <table class = "table table-striped table-bordered">
                <thead>
                    @foreach($dataSystem->dataScaffold('v') as $value)

                    <th>{{$value}}</th>
                    @endforeach

                    @if($dataSystem->getRelationAttributes() != null)

                    @foreach($dataSystem->getRelationAttributes() as $key => $value)

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

                        <td>{{$names->open()}}${{$names->tableName()}}->{{$value}}{{$names->close()}}</td>
                        @endforeach

                        @if($dataSystem->getRelationAttributes() != null)

                        @foreach($dataSystem->getRelationAttributes() as $key=>$value)

                        @foreach($value as $key1 => $value1)
                        <td>{{$names->open()}}${{$names->tableName()}}->{{str_singular($key)}}->{{$value1}}{{$names->close()}}</td>

                        @endforeach

                        @endforeach

                        @endif

                        <td>
                                <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/{{$names->tableNameSingle()}}/{{$names->open()}}${{$names->tableName()}}->id{{$names->close()}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/{{$names->tableNameSingle()}}/{{$names->open()}}${{$names->tableName()}}->id{{$names->close()}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/{{$names->tableNameSingle()}}/{{$names->open()}}${{$names->tableName()}}->id{{$names->close()}}'><i class = 'material-icons'>info</i></a>
                        </td>
                    </tr>
                    {{$names->endforeachh()}}
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script> var baseURL = "{{$names->open()}}URL::to('/'){{$names->close()}}"</script>
<script src = "{{$names->open()}} URL::asset('js/AjaxisBootstrap.js'){{$names->close()}}"></script>
<script src = "{{$names->open()}} URL::asset('js/scaffold-interface-js/customA.js'){{$names->close()}}"></script>
</html>
