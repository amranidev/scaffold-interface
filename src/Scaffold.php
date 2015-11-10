<?php
namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\Filesystem\Paths;
use Amranidev\ScaffoldInterface\Generators\Generator;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class Scaffold
{
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
        $this->names = new NamesGenerate($data);
        $this->paths = new Paths($this->names);
        $this->generator = new Generator($this->data($data, 'view'), $this->data($data, 'migration'), $this->names, $this->paths);
    }

    /**
     * To feetch reqeust between dataviews and datamigration
     *
     * @param Array  $data
     * @param String $spec
     * @return
     */
    public function data($data, $spec)
    {
        unset($data['TableName']);
        if ($spec == 'migration') {
            $i = 0;
        } else {
            $i = 1;
        }
        $request = [];
        foreach ($data as $key => $value) {
            if ($i == 1) {
                $i = 0;
            } elseif ($i == 0) {
                array_push($request, $value);
                $i = 1;
            }
        }
        return $request;
    }

    /**
     * Scaffold Migration
     *
     */
    public function Migration()
    {
        $this->generator->migration();
    }

    /**
     * Scaffold Model
     *
     */
    public function Model()
    {
        $this->generator->model();
    }

    /**
     * Scaffold Views
     *
     */
    public function Views()
    {
        $this->generator->dir();
        $this->generator->index();
        $this->generator->create();
        $this->generator->show();
        $this->generator->edit();
    }

    /**
     * Scaffold Controller
     *
     */
    public function Controller()
    {
        $this->generator->controller();
    }

    /**
     * Scaffold Route
     *
     */
    public function Route()
    {
        $this->generator->route();
    }
}
