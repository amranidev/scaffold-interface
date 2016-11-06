namespace {{config('amranidev.config.controllerNameSpace')}};

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use {{config('amranidev.config.modelNameSpace')}}\{{ucfirst($parser->singular())}};
use Amranidev\Ajaxis\Ajaxis;
use URL;
@foreach($dataSystem->getForeignKeys() as $key)

use {{config('amranidev.config.modelNameSpace')}}\{{ucfirst(str_singular($key))}};

@endforeach

/**
 * Class {{ucfirst($parser->singular())}}Controller.
 *
 * @author The scaffold-interface created at {{date("Y-m-d h:i:sa")}}
 * @link https://github.com/amranidev/scaffold-interface
 */
class {{ucfirst($parser->singular())}}Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - {{$parser->singular()}}';
        ${{$parser->plural()}} = {{ucfirst($parser->singular())}}::paginate(6);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$parser->singular()}}.index',compact('{{$parser->plural()}}','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - {{$parser->singular()}}';
        @foreach($dataSystem->getForeignKeys() as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->pluck('{{$dataSystem->getOnData()[$key]}}','id');
        @endforeach

        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$parser->singular()}}.create'@if($dataSystem->getForeignKeys() != null),compact('title',@foreach($dataSystem->getForeignKeys() as $key => $value)'{{str_plural($value)}}' @if($value != last($dataSystem->getForeignKeys())),@endif @endforeach)@endif);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ${{$parser->singular()}} = new {{ucfirst($parser->singular())}}();

        @foreach($dataSystem->dataScaffold('v') as $value)

        ${{$parser->singular()}}->{{$value}} = $request->{{$value}};

        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$parser->singular()}}->{{lcfirst(str_singular($key))}}_id = $request->{{lcfirst(str_singular($key))}}_id;

        @endforeach

        ${{$parser->singular()}}->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new {{$parser->singular()}} has been created !!']);

        return redirect('{{$parser->singular()}}');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - {{$parser->singular()}}';

        if($request->ajax())
        {
            return URL::to('{{$parser->singular()}}/'.$id);
        }

        ${{$parser->singular()}} = {{ucfirst($parser->singular())}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$parser->singular()}}.show',compact('title','{{$parser->singular()}}'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - {{$parser->singular()}}';
        if($request->ajax())
        {
            return URL::to('{{$parser->singular()}}/'. $id . '/edit');
        }

        @foreach($dataSystem->getForeignKeys() as $key => $value)

        ${{str_plural($value)}} = {{ucfirst(str_singular($value))}}::all()->pluck('{{$dataSystem->getOnData()[$key]}}','id');

        @endforeach

        ${{$parser->singular()}} = {{ucfirst($parser->singular())}}::findOrfail($id);
        return view('@if(config('amranidev.config.loadViews')){{config('amranidev.config.loadViews')}}::@endif{{$parser->singular()}}.edit',compact('title','{{$parser->singular()}}' @if($dataSystem->getForeignKeys() != null),@foreach($dataSystem->getForeignKeys() as $key => $value)'{{str_plural($value)}}'@if($value != last($dataSystem->getForeignKeys())),@endif @endforeach) @else )@endif);
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
        ${{$parser->singular()}} = {{ucfirst($parser->singular())}}::findOrfail($id);
    	@foreach($dataSystem->dataScaffold('v') as $value)

        ${{$parser->singular()}}->{{$value}} = $request->{{$value}};
        @endforeach

        @foreach($dataSystem->getForeignKeys() as $key)

        ${{$parser->singular()}}->{{lcfirst(str_singular($key))}}_id = $request->{{lcfirst(str_singular($key))}}_id;

        @endforeach

        ${{$parser->singular()}}->save();

        return redirect('{{$parser->singular()}}');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link   https://github.com/amranidev/ajaxis
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::{{$parser->getParse()}}Deleting('Warning!!','Would you like to remove This?','/{{$parser->singular()}}/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	${{$parser->singular()}} = {{ucfirst($parser->singular())}}::findOrfail($id);
     	${{$parser->singular()}}->delete();
        return URL::to('{{$parser->singular()}}');
    }
}
