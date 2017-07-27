<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

/**
 * Class     Generator.
 *
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Generator extends Filesystem
{
    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\ViewGenerate
     */
    private $view;

    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\ModelGenerate
     */
    private $model;

    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\MigrationGenerate
     */
    private $migration;

    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\ControllerGenerate
     */
    private $controller;

    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\RouteGenerate
     */
    private $route;

    /**
     * The ViewGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Filesystem\Path
     */
    private $paths;

    /**
     * Create new Generator instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->view = app()->make('ViewGenerate');
        $this->model = app()->make('ModelGenerate');
        $this->migration = app()->make('MigrationGenerate');
        $this->controller = app()->make('ControllerGenerate');
        $this->route = app()->make('RouteGenerate');
        $this->paths = app()->make('Path');
    }

    /**
     * Generate views.
     *
     * @return void
     */
    public function views()
    {
        $this->make($this->paths->indexPath(), $this->view->generate()['index']);
        $this->make($this->paths->createPath(), $this->view->generate()['create']);
        $this->make($this->paths->showPath(), $this->view->generate()['show']);
        $this->make($this->paths->editPath(), $this->view->generate()['edit']);
    }

    /**
     * Generate views directory.
     *
     * @return void
     */
    public function dir()
    {
        $this->makeDir($this->paths->dirPath());
    }

    /**
     * Generate Model.
     *
     * @return void
     */
    public function model()
    {
        $this->make($this->paths->modelPath(), $this->model->generate());
    }

    /**
     * Generate Migration.
     *
     * @return void
     */
    public function migration()
    {
        $this->make($this->paths->migrationPath, $this->migration->generate());
    }

    /**
     * Generate Controller.
     *
     * @return void
     */
    public function controller()
    {
        $this->make($this->paths->controllerPath(), $this->controller->generate());
    }

    /**
     * Generate route.
     *
     * @return void
     */
    public function route()
    {
        $this->append($this->paths->routePath(), $this->route->generate());
    }

    /**
     * Get model generator instance.
     *
     * @return \Amranidev\ScaffoldInterface\Generators\ModelGenerate
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get migration generator instance.
     *
     * @return \Amranidev\ScaffoldInterface\Generators\MigrationGenerate
     */
    public function getMigration()
    {
        return $this->migration;
    }

    /**
     * Get view generator instance.
     *
     * @return \Amranidev\ScaffoldInterface\Generators\ViewGenerate
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Get controller generator instance.
     *
     * @return \Amranidev\ScaffoldInterface\Generators\ControllerGenerate
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * get route.
     *
     * @return \Amranidev\ScaffoldInterface\Generators\RouteGenerate
     */
    public function getRoute()
    {
        return $this->route;
    }
}
