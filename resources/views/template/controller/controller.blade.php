namespace {{config('amranidev.config.controllerNameSpace')}};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use {{config('amranidev.config.modelNameSpace')}}\{{$names->tableName()}};
use Amranidev\Ajaxis\Ajaxis;
use URL;
@foreach($dataSystem->getForeignKeys() as $key)

use {{config('amranidev.config.modelNameSpace')}}\{{ucfirst(str_singular($key))}};

@endforeach

/**
 * Class {{$names->tableName()}}Controller
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/amranidev/scaffold-interface
 */
class {{$names->tableName()}}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ${{$names->tableNames()}} = {{$names->tableName()}}::all();
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

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$dataSystem->getOnData()[$key]}}','id');
        @endforeach

        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.create'@if($dataSystem->getForeignKeys() != null),compact(@foreach($dataSystem->getForeignKeys() as $key => $value)'{{str_plural($value)}}' @if($value != last($dataSystem->getForeignKeys())),@endif @endforeach)@endif);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ${{$names->tableNameSingle()}} = new {{$names->tableName()}}();

        @foreach($dataSystem->dataScaffold('v') as $value)

        ${{$names->tableNameSingle()}}->{{$value}} = $request->{{$value}};

        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$names->tableNameSingle()}}->{{lcfirst(str_singular($key))}}_id = $request->{{lcfirst(str_singular($key))}}_id;

        @endforeach

        ${{$names->tableNameSingle()}}->save();

        return redirect('{{$names->tableNameSingle()}}');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('{{$names->tableNameSingle()}}/'.$id);
        }

        ${{$names->tableNameSingle()}} = {{$names->tableName()}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.show',compact('{{$names->TableNameSingle()}}'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('{{$names->tableNameSingle()}}/'. $id . '/edit');
        }

        @foreach($dataSystem->getForeignKeys() as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->lists('{{$dataSystem->getOnData()[$key]}}','id');

        @endforeach

        ${{$names->tableNameSingle()}} = {{$names->tableName()}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$names->TableNameSingle()}}.edit',compact('{{$names->TableNameSingle()}}' @if($dataSystem->getForeignKeys() != null),@foreach($dataSystem->getForeignKeys() as $key => $value)'{{str_plural($value)}}'@if($value != last($dataSystem->getForeignKeys())),@endif @endforeach) @else )@endif);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        ${{$names->tableNameSingle()}} = {{$names->tableName()}}::findOrfail($id);
    	@foreach($dataSystem->dataScaffold('v') as $value)

        ${{$names->tableNameSingle()}}->{{$value}} = $request->{{$value}};
        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$names->tableNameSingle()}}->{{lcfirst(str_singular($key))}}_id = $request->{{lcfirst(str_singular($key))}}_id;

        @endforeach

        ${{$names->tableNameSingle()}}->save();

        return redirect('{{$names->tableNameSingle()}}');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::{{$names->getParse()}}Deleting('Warning!!','Would you like to remove This?','/{{$names->TableNameSingle()}}/'. $id . '/delete/');

        if($request->ajax())
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
     	${{$names->tableNameSingle()}} = {{$names->tableName()}}::findOrfail($id);
     	${{$names->tableNameSingle()}}->delete();
        return URL::to('{{$names->tableNameSingle()}}');
    }
}
