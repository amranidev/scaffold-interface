<?php

namespace Amranidev\ScaffoldInterface;

/**
 * Class Scaffold.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Scaffold
{
    /**
     * Generator instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\Generator
     */
    public $generator;

    /**
     * Create new scaffold instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->generator = app()->make('Generator');
    }

    /**
     * Scaffold Migration.
     *
     * @return \Amranidev\ScaffoldInterface\Scaffold
     */
    public function migration()
    {
        $this->generator->migration();

        return $this;
    }

    /**
     * Scaffold Model.
     *
     * @return \Amranidev\ScaffoldInterface\Scaffold
     */
    public function model()
    {
        $this->generator->model();

        return $this;
    }

    /**
     * Scaffold Views.
     *
     * @return \Amranidev\ScaffoldInterface\Scaffold
     */
    public function views()
    {
        $this->generator->dir();
        $this->generator->views();

        return $this;
    }

    /**
     * Scaffold Controller.
     *
     * @return \Amranidev\ScaffoldInterface\Scaffold
     */
    public function controller()
    {
        $this->generator->controller();

        return $this;
    }

    /**
     * Scaffold Route.
     *
     * @return \Amranidev\ScaffoldInterface\Scaffold
     */
    public function route()
    {
        $this->generator->route();

        return $this;
    }
}
