<?php

namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\Datasystem\Datasystem;
use Amranidev\ScaffoldInterface\Filesystem\Path;
use Amranidev\ScaffoldInterface\Generators\Generator;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class     Scaffold.
 *
 *
 * @author   Amrani Houssain <amranidev@gmail.com>
 */
class Scaffold
{
    /**
     * DataSystem instance.
     */
    public $dataS;

    /**
     * Path instance.
     *
     * @var paths
     */
    public $paths;

    /**
     * Names instance.
     *
     * @var names
     */
    public $names;

    /**
     * Generator instance.
     *
     * @var generator
     */
    public $generator;

    /**
     * Create new scaffold instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->dataS = new Datasystem($data);

        $this->names = new NamesGenerate($data);

        $this->paths = new Path($this->names);

        $this->generator = new Generator($this->dataS, $this->names, $this->paths);
    }

    /**
     * Scaffold Migration.
     *
     * @return Scaffold
     */
    public function migration()
    {
        $this->generator->migration();

        return $this;
    }

    /**
     * Scaffold Model.
     *
     * @return Scaffold
     */
    public function model()
    {
        $this->generator->model();

        return $this;
    }

    /**
     * Scaffold Views.
     *
     * @return Scaffold
     */
    public function views()
    {
        $this->generator->dir();
        $this->generator->index();
        $this->generator->create();
        $this->generator->show();
        $this->generator->edit();

        return $this;
    }

    /**
     * Scaffold Controller.
     *
     * @return Scaffold
     */
    public function controller()
    {
        $this->generator->controller();

        return $this;
    }

    /**
     * Scaffold Route.
     *
     * @return Scaffold
     */
    public function route()
    {
        $this->generator->route();

        return $this;
    }
}
