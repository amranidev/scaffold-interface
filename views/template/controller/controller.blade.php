namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\{{$TableName}};

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
        return view('{{$TableNameSingle}}.create');
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
        ${{$TableNameSingle}} = {{$TableName}}::findOrfail($id);
        return view('{{$TableNameSingle}}.edit',compact('{{$TableNameSingle}}'));
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

        ${{$TableNameSingle}}->save();

        return redirect('{{$TableNameSingle}}');
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
        return redirect('{{$TableNameSingle}}');
    }
}
