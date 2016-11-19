@@extends('scaffold-interface.layouts.defaultMaterialize')
@@section('title','Index')
@@section('content')
<div class = 'container'>
    <h1>{{$parser->singular()}} Index</h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New {{$parser->singular()}}</button>
        </form>
        @if($dataSystem->getRelationAttributes() != null)
        <ul id="dropdown" class="dropdown-content">
            @foreach($dataSystem->getRelationAttributes() as $key => $value)
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
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @@endforeach
        </tbody>
    </table>
    @{!! ${{$parser->plural()}}->render() !!}
</div>
@@endsection
