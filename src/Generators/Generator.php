<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Filesystem\Filesystem;
use Amranidev\ScaffoldInterface\Filesystem\Paths;
use Amranidev\ScaffoldInterface\Generators\ControllerGenerate;
use Amranidev\ScaffoldInterface\Generators\MigrationGenerate;
use Amranidev\ScaffoldInterface\Generators\ModelGenerate;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;
use Amranidev\ScaffoldInterface\Generators\RouteGenerate;
use Amranidev\ScaffoldInterface\Generators\ViewGenerate;

/**
 * Class     Generator
 *
 * @package  scaffold-interface/Generators
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{

    /**
     * the DataSystem instance
     *
     * @var dataSystem
     */
    public $dataSystem;

    /**
     * @var ViewGenerate
     */
    public $view;

    /**
     * @var ModelGenerate
     */
    public $model;

    /**
     * @var MigrationGenerate
     */
    public $migration;

    /**
     * @var ControllerGenerate
     */
    public $controller;

    /**
     * @var RouteGenerate
     */
    public $route;

    /**
     * Create new Generator instance
     *
     * @param DataSystem $dataSystem
     * @param NamesGenerate
     * @param PathsGenerate
     */
    public function __construct(DataSystem $dataSystem, NamesGenerate $names, Paths $paths)
    {
        $this->dataSystem = $dataSystem;
        $this->view = new ViewGenerate($dataSystem, $names);
        $this->model = new ModelGenerate($names, $dataSystem);
        $this->migration = new MigrationGenerate($dataSystem, $names);
        $this->controller = new ControllerGenerate($names, $dataSystem);
        $this->route = new RouteGenerate($names);
        $this->paths = $paths;
    }

    /**
     * Generate index
     */
    public function index()
    {
        $this->make($this->paths->IndexPath(), $this->view->GenerateIndex());
    }

    /**
     * Generate create
     */
    public function create()
    {
        $this->make($this->paths->CreatePath(), $this->view->GenerateCreate());
    }

    /**
     * Generate show
     */
    public function show()
    {
        $this->make($this->paths->ShowPath(), $this->view->GenerateShow());
    }

    /**
     * Generate edit
     */
    public function edit()
    {
        $this->make($this->paths->EditPath(), $this->view->GenerateEdit());
    }

    /**
     * Generate views directory
     */
    public function dir()
    {
        $this->makeDir($this->paths->DirPath());
    }

    /**
     * Generate Model
     */
    public function model()
    {
        $this->make($this->paths->ModelPath(), $this->model->generate());
    }

    /**
     * Generate Migration
     */
    public function migration()
    {
        $this->make($this->paths->MigrationPath(), $this->migration->generate());
    }

    /**
     * Generate Controller
     */
    public function controller()
    {
        $this->make($this->paths->ControllerPath(), $this->controller->generate());
    }

    /**
     * Generate route
     */
    public function route()
    {
        $this->append($this->paths->RoutePath(), $this->route->generate());
    }
}
