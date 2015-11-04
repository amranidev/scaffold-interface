<?php
namespace Amranidev\ScaffoldInterface;
use URL;
class ScaffoldTools
{

    public function FileCreate($content, $fileLocation) {
        $file = fopen($fileLocation, "w");
        fwrite($file, $content);
        fclose($file);
    }
    
    public function ModelTxt($TableName) {
$c = "<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class " . $TableName . " extends Model
{
    public \$timestamps = false;
}
";
        return $c;
    }
    
    public function Schema($R, $TableName, $TableNames) {
        $k = "<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class " . $TableName . " extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('" . $TableNames . "',function (Blueprint \$table){
        \$table->increments('id');\n\t\t";
        
        $i = 0;
        //unset($R['TableName']);
        foreach ($R as $key => $value) {
            
            if ($i == 0) {
                $k.= "\$table->" . $value;
                $i = 1;
            } 
            elseif ($i == 1) {
                $k.= "('" . $value . "');\n\t\t";
                $i = 0;
            }
        }
        
        $k.= "});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('" . $TableNames . "');
     }
}";
       return $k;
    }
    
    public function vIndex($R, $TableName, $TableNameSingle,$TableNames) {
        $createApi = URL::to("" . $TableNameSingle . '/create');
        $index = "@extends('layouts.Master')
@section('title','" . $TableNames . "')
@section('content')
<h1>" . $TableName . " Index</h1>
        <form method = 'get' action = '" . $createApi . "'>
        <button class = 'btn red' type = 'submit'>Create New " . $TableName . "</button>
        </form>
        <br>
        <table class = 'responsive-table centered highlight'>
        <thead>
        ";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $index.= "<th>" . $value . "</th>\n";
                $i = 1;
            }
        }
        
        $editApi = URL::to($TableNameSingle);
        $index.= "<th>Actions</th>\n
      </thead>
      <tbody>
      @foreach(\$" . $TableNames . " as " . "\$" . $TableNameSingle . ")
      <tr>";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $index.= "<td>{{\$" . $TableNameSingle . "->" . $value . "}}</td>\n";
                $i = 1;
            }
        }
        $index.= "
      <td>
      <div class = 'row'>
      <div class = 'col s4'><form method = 'get' action = '" . $editApi . "/{{\$" . $TableNameSingle . "->id}}/delete'><button class = 'btn-floating red'><i class = 'material-icons'>delete</i></button></form></div>
      <div class = 'col s4'><form method = 'get' action = '" . $editApi . "/{{\$" . $TableNameSingle . "->id}}/edit'><button type = 'submit' class = 'btn-floating blue'><i class = 'material-icons'>edit</i></button></form></div>
      <div class = 'col s4'><form method = 'get' action = '" . $editApi . "/{{\$" . $TableNameSingle . "->id}}'><button type = 'submit' class = 'btn-floating yellow'><i class = 'material-icons'>info</i></button></form></div></div></td>
      </tr>
      @endforeach
      </tbody>
      </table>
      @endsection";
      return $index;
    }
    public function vCreate($R, $TableName, $TableNameSingle) {
        $createApi = URL::to("" . $TableNameSingle . "");
        $create = "
@extends('layouts.Master')
@section('title','" . $TableName . "')
@section('content')
<h1>Create a " . $TableName . "</h1>
<form method = 'get' action = '" . $createApi . "'>
<button class = 'btn blue'>" . $TableName . " Index</button>
</form>
<br>
<form method = 'POST' action = '" . $createApi . "'>
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $create.= "<label>" . $value . ":</label><input type = 'text' name = '" . $value . "'>";
                $i = 1;
            }
        }
        $create.= "
<button class = 'btn red' type ='submit'>Create</button>
</form>
@endsection";
        return $create;
    }
    public function vEdit($R, $TableName, $TableNameSingle) {
        $createApi = URL::to("" . $TableNameSingle . "");
        $edit = "
@extends('layouts.Master')
@section('title','Create')
@section('content')
<h1>Edit " . $TableName . "</h1>
<form method = 'get' action = '" . $createApi . "'>
<button class = 'btn blue'>" . $TableName . " Index</button>
</form>
<br>
<form method = 'POST' action = '" . $createApi . "/{{\$" . $TableNameSingle . "->id}}/update'>
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $edit.= "\n<label>" . $value . ":</label>\n
                    <input type = 'text' name = '" . $value . "' value = '{{\$" . $TableNameSingle . "->" . $value . "}}'>\n";
                $i = 1;
            }
        }
        $edit.= "
<button class = 'btn red' type ='submit'>Update</button>
</form>
@endsection";
        
        return $edit;
    }
    public function vShow($R, $TableName, $TableNameSingle) {
        $createApi = URL::to("" . $TableNameSingle . "");
        
        $show = "
@extends('layouts.Master')
@section('title','Create')
@section('content')
<h1>Show " . $TableName . "</h1>
<form method = 'get' action = '" . $createApi . "'>
<button class = 'btn blue'>" . $TableName . " Index</button>
</form>
<br>
<table class = 'highlight bordered'>
";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $show.= "\n<tr>\n
                    <td><b><i>" . $value . ":</i></b></td>\n
                    <td>{{\$" . $TableNameSingle . "->" . $value . "}}</td>\n
                    </tr>\n";
                $i = 1;
            }
        }
     $show.= "</table>\n@endsection";
        
        
        return $show;
    }
    public function GenerateController($R, $TableName, $TableNameSingle, $TableNames) {
        $controller = "<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Controllers\Controller;
use App\\" . $TableName . ";
class " . $TableName . "Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        \$" . $TableNames . " = " . $TableName . "::all();
        return view('" . $TableNameSingle . ".index',compact('" . $TableNames . "'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('" . $TableNameSingle . ".create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return \Illuminate\Http\Response
     */
    public function store(Request \$request)
    {
        \$input = Request::except('_token');

        \$" . $TableNameSingle . " = new " . $TableName . "();
        ";
        
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $controller.= "\n\t\t\$" . $TableNameSingle . "->" . $value . " = \$input['" . $value . "'];\n";
                $i = 1;
            }
        }
        $controller.= "
        \t\t\$" . $TableNameSingle . "->save();
        return redirect('" . $TableNameSingle . "');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function show(\$id)
    {
        \$" . $TableNameSingle . " = " . $TableName . "::findOrfail(\$id);
        return view('" . $TableNameSingle . ".show',compact('" . $TableNameSingle . "'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function edit(\$id)
    {
        \$" . $TableNameSingle . " = " . $TableName . "::findOrfail(\$id);
        return view('" . $TableNameSingle . ".edit',compact('" . $TableNameSingle . "'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function update(\$id)
    {
        \$input = Request::except('_token');
        \$" . $TableNameSingle . " = " . $TableName . "::findOrfail(\$id);";
        $i = 1;
        foreach ($R as $key => $value) {
            if ($i == 1) $i = 0;
            elseif ($i == 0) {
                $controller.= "\n\t\t\$" . $TableNameSingle . "->" . $value . " = \$input['" . $value . "'];\n";
                $i = 1;
            }
        }
        $controller.= "\t\t\$" . $TableNameSingle . "->save();
        return redirect('" . $TableNameSingle . "');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\$id)
    {
     \t\$" . $TableNameSingle . " = " . $TableName . "::findOrfail(\$id);
     \t\$" . $TableNameSingle . "->delete();
        return redirect('" . $TableNameSingle . "');
    }
}
         ";
        return $controller;
    }
    
    public function generateRoute($TableName, $TableNameSingle) {
        $route = "\n\n
//" . $TableName . " Resources \n
Route::resource('" . $TableNameSingle . "','" . $TableName . "Controller');
Route::post('" . $TableNameSingle . "/{id}/update','" . $TableName . "Controller@update');
Route::get('" . $TableNameSingle . "/{id}/delete','" . $TableName . "Controller@destroy');\n\n//*********************\n";
        return $route;
    }
}
