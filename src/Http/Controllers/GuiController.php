<?php

namespace Amranidev\ScaffoldInterface\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use Amranidev\ScaffoldInterface\Attribute;
use Amranidev\ScaffoldInterface\Datasystem\Database\DatabaseManager;
use Amranidev\ScaffoldInterface\Generators\HomePageGenerator\HomePageGenerator;
use Amranidev\ScaffoldInterface\Scaffold;
use Amranidev\ScaffoldInterface\Scaffoldinterface;
use AppController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Request;
use Session;
use URL;

/**
 * Class GuiController.
 *
 *
 * @author  Amrani Houssain <amranidev@gmail.com>
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
        $scaffoldList = DatabaseManager::tableNames();

        return view('scaffold-interface::scaffoldApp', compact('scaffold', 'scaffoldList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::except('_token');

        $scaffold = new Scaffold($data);

        $scaffold->migration()->model()->controller()->route()->views();

        $scaffoldInterface = new Scaffoldinterface();

        $scaffoldInterface->migration = $scaffold->paths->migrationPath;
        $scaffoldInterface->model = $scaffold->paths->modelPath();
        $scaffoldInterface->controller = $scaffold->paths->controllerPath();
        $scaffoldInterface->views = $scaffold->paths->dirPath();
        $scaffoldInterface->tablename = $scaffold->names->tableNames();
        $scaffoldInterface->package = config('amranidev.config.package');
        $scaffoldInterface->save();

        Session::flash('status', 'Created Successfully'.$scaffold->names->tableName());

        return redirect('scaffold');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scaffoldInterface = Scaffoldinterface::FindOrFail($id);

        unlink($scaffoldInterface->migration);
        unlink($scaffoldInterface->model);
        unlink($scaffoldInterface->controller);
        unlink($scaffoldInterface->views.'/index.blade.php');
        unlink($scaffoldInterface->views.'/create.blade.php');
        unlink($scaffoldInterface->views.'/show.blade.php');
        unlink($scaffoldInterface->views.'/edit.blade.php');
        rmdir($scaffoldInterface->views);

        //Clear Routes Resources
        $this->clearRoutes(lcfirst(str_singular($scaffoldInterface->tablename)));

        $scaffoldInterface->delete();

        Session::flash('status', 'Deleted Successfully');

        return URL::to('scaffold');
    }

    /**
     * Delete confirmation message by ajaxis.
     *
     * @link https://github.com/amranidev/ajaxis
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMsg($id)
    {
        $scaffold = Scaffoldinterface::FindOrFail($id);

        if (Schema::hasTable($scaffold->tablename)) {
            $table = $scaffold->tablename;

            return view('scaffold-interface::template.DeleteMessage.delete', compact('table'))->render();
        }

        $msg = Ajaxis::Mtdeleting('Warning!!', "Would you like to rollback '".$scaffold->tablename."' ?? by rollbacking this, make sure that you have rollbacked ".$scaffold->tablename.' from database.', '/scaffold/guirollback/'.$id);

        return $msg;
    }

    /**
     * Get attributes.
     *
     * @param string $table
     *
     * @return \Illuminate\Http\Response
     */
    public function getResult($table)
    {
        $attributes = new Attribute($table);

        if (Request::ajax()) {
            return $attributes->getAttributes();
        }
    }

    /**
     * Scaffold a home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $scaffoldList = Scaffoldinterface::all();

        $home = new HomePageGenerator($scaffoldList);

        $home->burn();

        Session::flash('status', 'Home Page Generated Successfully');

        return redirect('scaffold/scaffoldHomePageIndex');
    }

    /**
     * Show homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('HomePageScaffold');
    }

    /**
     * Delete homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePageDelete()
    {
        try {
            unlink(base_path().'/resources/views/HomePageScaffold.blade.php');
        } catch (\Exception $e) {
            return 'Scaffold-Interface : '.$e->getMessage();
        }
        Session::flash('status', 'HomePage Deleted Successfully');

        return redirect('scaffold');
    }

    /**
     * Migrate schema.
     *
     * @return \Illuminate\Http\Response
     */
    public function migrate()
    {
        try {
            Artisan::call('migrate', ['--path' => config('amranidev.config.database')]);

            exec('cd '.base_path().' && composer dump-autoload');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $Msg = str_replace("\n", '', Artisan::output());

        Session::flash('status', $Msg);

        return redirect('scaffold');
    }

    /**
     * Schema rollbacking.
     *
     * @throws Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function rollback()
    {
        try {
            if (!Scaffoldinterface::all()->count()) {
                throw new \Exception('Nothing to rollback');
            }

            Artisan::call('migrate:rollback');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $Msg = str_replace("\n", '', Artisan::output());

        Session::flash('status', $Msg);

        return redirect('scaffold');
    }

    /**
     * Clear routes.
     *
     * @param string $remove
     *
     * @return mixed
     */
    private function clearRoutes($remove)
    {
        $path = config('amranidev.config.model').'/Http/routes.php';

        $lines = file($path, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $key => $line) {
            if (strstr($line, $remove)) {
                unset($lines[$key]);
            }
        }

        $data = implode("\n", array_values($lines));

        return file_put_contents($path, $data);
    }
}
