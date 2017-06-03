@@extends('scaffold-interface.layouts.app')
@@section('title','Show')
@@section('content')
<section class="content">
    <h1>Show {{$parser->singular()}}</h1>
    <br>
       <a href="@{!!url('{{$parser->singular()}}')!!}" class = 'btn btn-danger'>{{ucwords($parser->singular())}} Index</a>
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
                    <b><i>{{$value1}} : </i></b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{str_singular($key)}}->{{$value1}}!!}</td>
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
</section>
@@endsection
