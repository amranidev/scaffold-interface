@@extends('scaffold-interface.layouts.app')
@@section('title','Index')
@@section('content')
<section class="content">
    <h1>{{ucfirst($parser->singular())}} Index</h1>
    <form class = 'col s3' method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New {{$parser->singular()}}</button>
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
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
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
            @@foreach(${{$parser->plural()}} as ${{lcfirst($parser->singular())}})
            <tr>
                @foreach($dataSystem->dataScaffold('v') as $value)
                <td>@{!!${{lcfirst($parser->singular())}}->{{$value}}!!}</td>
                @endforeach
                @if($dataSystem->getRelationAttributes() != null)
                @foreach($dataSystem->getRelationAttributes() as $key=>$value)
                @foreach($value as $key1 => $value1)
                <td>@{!!${{$parser->singular()}}->{{str_singular($key)}}->{{$value1}}!!}</td>
                @endforeach
                @endforeach
                @endif
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @@endforeach
        </tbody>
    </table>
    @{!! ${{$parser->plural()}}->render() !!}
</section>
@@endsection
