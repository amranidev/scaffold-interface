<?php

namespace Amranidev\ScaffoldInterface\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Amranidev\Ajaxis\Ajaxis;
use Amranidev\ScaffoldInterface\Attribute;
use Amranidev\ScaffoldInterface\Generators\HomePageGenerator\HomePageGenerator;
use Amranidev\ScaffoldInterface\Scaffold;
use Amranidev\ScaffoldInterface\Scaffoldinterface;
use AppController;
use Illuminate\Support\Facades\Artisan;
use Request;
use Session;
use URL;

/**
 * Class GuiController
 *
 * @package scaffold-interface/Http/Controllers
 * @author  Amrani Houssain <amranidev@gmail.com>
 *
 * @todo Testing
 */
class GuiController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scaffold = Scaffoldinterface::paginate(6);
        $scaffoldList = Scaffoldinterface::all()->lists('tablename');
        return view('scaffold-interface::scaffoldApp', compact('scaffold', 'scaffoldList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::except('_token');

        $scaffold = new Scaffold($data);

        $scaffold->Migration()->Model()->Controller()->Views()->Route();

        $scaffoldInterface = new Scaffoldinterface();

        $scaffoldInterface->migration = $scaffold->paths->migrationPath;
        $scaffoldInterface->model = $scaffold->paths->ModelPath();
        $scaffoldInterface->controller = $scaffold->paths->ControllerPath();
        $scaffoldInterface->views = $scaffold->paths->DirPath();
        $scaffoldInterface->tablename = $scaffold->names->TableNames();
        $scaffoldInterface->save();

        Session::flash('status', ' Successfully created ' . $scaffold->names->TableName());

        return redirect('scaffold');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scaffoldInterface = Scaffoldinterface::FindOrFail($id);

        unlink($scaffoldInterface->migration);
        unlink($scaffoldInterface->model);
        unlink($scaffoldInterface->controller);
        unlink($scaffoldInterface->views . '/index.blade.php');
        unlink($scaffoldInterface->views . '/create.blade.php');
        unlink($scaffoldInterface->views . '/show.blade.php');
        unlink($scaffoldInterface->views . '/edit.blade.php');
        rmdir($scaffoldInterface->views);

        //Clear Routes Resources
        clearRoutes(lcfirst(str_singular($scaffoldInterface->tablename)));

        $scaffoldInterface->delete();

        Session::flash('status', 'Successfully deleted');

        return URL::to('scaffold');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link https://github.com/amranidev/ajaxis
     *
     * @return String
     */
    public function deleteMsg($id)
    {
        $scaffold = Scaffoldinterface::FindOrFail($id);

        if (Schema::hasTable($scaffold->tablename)) {
            $table = $scaffold->tablename;

            return view('scaffold-interface::template.DeleteMessage.delete', compact('table'))->render();
        }

        $msg = Ajaxis::Mtdeleting("Warning!!", "Would you like to rollback '" . $scaffold->tablename . "' ?? by rollbacking this, make sure that you have rollbacked " . $scaffold->tablename . " from database.", '/scaffold/guirollback/' . $id);

        return $msg;
    }

    /**
     * get Attributes from
     *
     * @param String $table
     *
     * @return Array
     */
    public function GetResult($table)
    {
        $attributes = new Attribute($table);

        if (Request::ajax()) {
            return $attributes->getAttributes();
        }
    }

    /**
     * Generate Home Page for app
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $scaffoldList = Scaffoldinterface::all();

        $home = new HomePageGenerator($scaffoldList);

        $home->Burn();

        Session::flash('status', 'Home Page Generated Successfully');

        return redirect('scaffold/scaffoldHomePageIndex');
    }

    /**
     * get index page for the app
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('HomePageScaffold');
    }

    /**
     * delete index page
     *
     * @return \Illuminate\Http\Response
     */
    public function homePageDelete()
    {
        try {
            unlink(base_path() . '/resources/views/HomePageScaffold.blade.php');
        } catch (\Exception $e) {
            return "Scaffold-Interface : " . $e->getMessage();
        }
        Session::flash('status', 'Home Page Successfully deleted');
        return redirect('scaffold');
    }

    /**
     * Migrate table ORM
     *
     * @return \Illuminate\Http\Response
     */
    public function migrate()
    {
        try {
            $exitCode = Artisan::call('migrate');
            exec('cd ' . base_path() . ' && composer dump-autoload');
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $Msg = str_replace("\n", "", Artisan::output());

        Session::flash('status', $Msg);

        return redirect('scaffold');
    }

    /**
     * Rollback a table from database
     *
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function rollback()
    {
        try {
            if (!Scaffoldinterface::all()->count()) {
                throw new \Exception("Nothing to rollback");
            }
            $exitCode = Artisan::call('migrate:rollback');
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $Msg = str_replace("\n", "", Artisan::output());

        Session::flash('status', $Msg);

        return redirect('scaffold');
    }
}
