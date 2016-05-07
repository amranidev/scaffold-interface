namespace {{config('amranidev.config.controllerNameSpace')}};

use Request;
use App\Http\Controllers\Controller;
use {{config('amranidev.config.modelNameSpace')}}\{{$names->TableName()}};
use Amranidev\Ajaxis\Ajaxis;
use URL;
@foreach($dataSystem->getForeignKeys() as $key)

use {{config('amranidev.config.modelNameSpace')}}\{{ucfirst(str_singular($key))}};

@endforeach

/**
 * Class {{$names->TableName()}}Controller
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/amranidev/scaffold-interfac
 */
class {{$names->TableName()}}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${{$names->TableNames()}} = {{$names->TableName()}}::all();
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.index',compact('{{$names->TableNames()}}'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @foreach($dataSystem->getForeignKeys() as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$dataSystem->onData[$key]}}','id');
        @endforeach

        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.create'
        @if($dataSystem->getForeignKeys() != null)
        ,compact(
        @foreach($dataSystem->getForeignKeys() as $key => $value)
        '{{str_plural($value)}}'
        @if($value != last($dataSystem->getForeignKeys())),
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

        ${{$names->TableNameSingle()}} = new {{$names->TableName()}}();

        @foreach($dataSystem->dataScaffold('v') as $value)

        ${{$names->TableNameSingle()}}->{{$value}} = $input['{{$value}}'];

        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$names->TableNameSingle()}}->{{lcfirst(str_singular($key))}}_id = $input['{{lcfirst(str_singular($key))}}_id'];

        @endforeach

        ${{$names->TableNameSingle()}}->save();

        return redirect('{{$names->TableNameSingle()}}');
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
            return URL::to('{{$names->TableNameSingle()}}/'.$id);
        }

        ${{$names->TableNameSingle()}} = {{$names->TableName()}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.show',compact('{{$names->TableNameSingle()}}'));
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
            return URL::to('{{$names->TableNameSingle()}}/'. $id . '/edit');
        }

        @foreach($dataSystem->getForeignKeys() as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$dataSystem->onData[$key]}}','id');

        @endforeach

        ${{$names->TableNameSingle()}} = {{$names->TableName()}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.edit',compact('{{$names->TableNameSingle()}}'
        @if($dataSystem->getForeignKeys() != null)
        ,
        @foreach($dataSystem->getForeignKeys() as $key => $value)
        '{{str_plural($value)}}'
        @if($value != last($dataSystem->getForeignKeys())),
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

        ${{$names->TableNameSingle()}} = {{$names->TableName()}}::findOrfail($id);
    	@foreach($dataSystem->dataScaffold('v') as $value)

        ${{$names->TableNameSingle()}}->{{$value}} = $input['{{$value}}'];
        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$names->TableNameSingle()}}->{{lcfirst(str_singular($key))}}_id = $input['{{lcfirst(str_singular($key))}}_id'];

        @endforeach

        ${{$names->TableNameSingle()}}->save();

        return redirect('{{$names->TableNameSingle()}}');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link https://github.com/amranidev/ajaxis
     *
     * @return String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::{{$names->getParse()}}Deleting('Warning!!','Would you like to remove This?','/{{$names->TableNameSingle()}}/'. $id . '/delete/');

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
     	${{$names->TableNameSingle()}} = {{$names->TableName()}}::findOrfail($id);
     	${{$names->TableNameSingle()}}->delete();
        return URL::to('{{$names->TableNameSingle()}}');
    }

}
