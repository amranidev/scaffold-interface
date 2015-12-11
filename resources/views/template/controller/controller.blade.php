namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\{{$TableName}};
use Amranidev\Ajaxis\Ajaxis;
use URL;
@foreach($foreignKeys as $key)

use App\{{ucfirst(str_singular($key))}};

@endforeach

class {{$TableName}}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${{$TableNames}} = {{$TableName}}::all();
        return view('{{$TableNameSingle}}.index',compact('{{$TableNames}}'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @foreach($foreignKeys as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$onData[$key]}}','id');
        @endforeach

        return view('{{$TableNameSingle}}.create'
        @if($foreignKeys != null)
        ,compact(
        @foreach($foreignKeys as $key => $value)
        '{{str_plural($value)}}'
        @if($value != last($foreignKeys)),
        @endif
        @endforeach)
        @endif
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        ${{$TableNameSingle}} = new {{$TableName}}();

        @foreach($dataS as $value)

        ${{$TableNameSingle}}->{{$value}} = $input['{{$value}}'];

        @endforeach

        @foreach($foreignKeys as $key)

        ${{$TableNameSingle}}->{{lcfirst(str_singular($key))}}_id = $input['{{lcfirst(str_singular($key))}}_id'];

        @endforeach

        ${{$TableNameSingle}}->save();

        return redirect('{{$TableNameSingle}}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('{{$TableNameSingle}}/'.$id);
        }

        ${{$TableNameSingle}} = {{$TableName}}::findOrfail($id);
        return view('{{$TableNameSingle}}.show',compact('{{$TableNameSingle}}'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('{{$TableNameSingle}}/'. $id . '/edit');
        }

        @foreach($foreignKeys as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$onData[$key]}}','id');

        @endforeach

        ${{$TableNameSingle}} = {{$TableName}}::findOrfail($id);
        return view('{{$TableNameSingle}}.edit',compact('{{$TableNameSingle}}'
        @if($foreignKeys != null)
        ,
        @foreach($foreignKeys as $key => $value)
        '{{str_plural($value)}}'
        @if($value != last($foreignKeys)),
        @endif
        @endforeach
        )
        @else
        )
        @endif
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        ${{$TableNameSingle}} = {{$TableName}}::findOrfail($id);
    	@foreach($dataS as $value)

        ${{$TableNameSingle}}->{{$value}} = $input['{{$value}}'];
        @endforeach

        @foreach($foreignKeys as $key)

        ${{$TableNameSingle}}->{{lcfirst(str_singular($key))}}_id = $input['{{lcfirst(str_singular($key))}}_id'];

        @endforeach

        ${{$TableNameSingle}}->save();

        return redirect('{{$TableNameSingle}}');
    }

    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning','Would you like to remove This?','/{{$TableNameSingle}}/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	${{$TableNameSingle}} = {{$TableName}}::findOrfail($id);
     	${{$TableNameSingle}}->delete();
        return URL::to('{{$TableNameSingle}}');
    }

}
