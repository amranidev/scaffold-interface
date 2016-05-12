<?php

namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Filesystem\Path;
use Amranidev\ScaffoldInterface\Generators\Generator;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class     Scaffold
 *
 * @package  scaffold-interface
 * 
 * @author   Amrani Houssain <amranidev@gmail.com>
 *
 */
class Scaffold
{

    /**
     * The data system instance
     */
    public $dataS;

    /**
     * The Paths instance
     *
     * @var paths
     */
    public $paths;

    /**
     * The Names instance
     *
     * @var names
     */
    public $names;

    /**
     * The generator instance
     *
     * @var generator
     */
    public $generator;

    /**
     * Create new Scaffold instance
     *
     * @param Array $data
     */
    public function __construct($data)
    {

        $this->dataS = new DataSystem($data);

        $this->names = new NamesGenerate($data);

        $this->paths = new Path($this->names);

        $this->generator = new Generator($this->dataS, $this->names, $this->paths);
    }

    /**
     * Scaffold Migration
     *
     */
    public function migration()
    {
        $this->generator->migration();

        return $this;
    }

    /**
     * Scaffold Model
     *
     */
    public function model()
    {
        $this->generator->model();

        return $this;
    }

    /**
     * Scaffold Views
     *
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
     * Scaffold Controller
     *
     */
    public function controller()
    {
        $this->generator->controller();

        return $this;
    }

    /**
     * Scaffold Route
     *
     */
    public function route()
    {
        $this->generator->route();

        return $this;
    }
}
