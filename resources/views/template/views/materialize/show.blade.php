@@extends('scaffold-interface.layouts.defaultMaterialize')
@@section('title','Show')
@@section('content')
<div class = 'container'>
    <h1>Show {{$parser->singular()}}</h1>
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn blue'>{{$parser->singular()}} Index</button>
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
@@endsection
