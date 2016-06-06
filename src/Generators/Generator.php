<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Datasystem\Datasystem;
use Amranidev\ScaffoldInterface\Filesystem\Filesystem;
use Amranidev\ScaffoldInterface\Filesystem\Path;

/**
 * Class     Generator.
 *
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{
    /**
     * @var ViewGenerate
     */
    private $view;

    /**
     * @var ModelGenerate
     */
    private $model;

    /**
     * @var MigrationGenerate
     */
    private $migration;

    /**
     * @var ControllerGenerate
     */
    private $controller;

    /**
     * @var RouteGenerate
     */
    private $route;

    /**
     * @var Path
     */
    private $paths;

    /**
     * Create new Generator instance.
     *
     * @param DataSystem $dataSystem
     * @param NamesGenerate
     * @param PathsGenerate
     */
    public function __construct(Datasystem $dataSystem, NamesGenerate $names, Path $paths)
    {
        $this->view = new ViewGenerate($dataSystem, $names);
        $this->model = new ModelGenerate($names, $dataSystem);
        $this->migration = new MigrationGenerate($dataSystem, $names);
        $this->controller = new ControllerGenerate($names, $dataSystem);
        $this->route = new RouteGenerate($names);
        $this->paths = $paths;
    }

    /**
     * Generate index.
     */
    public function index()
    {
        $this->make($this->paths->indexPath(), $this->view->generateIndex());
    }

    /**
     * Generate create.
     */
    public function create()
    {
        $this->make($this->paths->createPath(), $this->view->generateCreate());
    }

    /**
     * Generate show.
     */
    public function show()
    {
        $this->make($this->paths->showPath(), $this->view->generateShow());
    }

    /**
     * Generate edit.
     */
    public function edit()
    {
        $this->make($this->paths->editPath(), $this->view->generateEdit());
    }

    /**
     * Generate views directory.
     */
    public function dir()
    {
        $this->makeDir($this->paths->dirPath());
    }

    /**
     * Generate Model.
     */
    public function model()
    {
        $this->make($this->paths->modelPath(), $this->model->generate());
    }

    /**
     * Generate Migration.
     */
    public function migration()
    {
        $this->make($this->paths->migrationPath, $this->migration->generate());
    }

    /**
     * Generate Controller.
     */
    public function controller()
    {
        $this->make($this->paths->controllerPath(), $this->controller->generate());
    }

    /**
     * Generate route.
     */
    public function route()
    {
        $this->append($this->paths->routePath(), $this->route->generate());
    }

    /**
     * get model generator.
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * get migration generator.
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * get view generator.
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * get controller generator.
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * get route generator.
     */
    public function getRoute()
    {
        return $this->route;
    }
}
