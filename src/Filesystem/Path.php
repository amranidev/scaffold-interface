<?php

namespace Amranidev\ScaffoldInterface\Filesystem;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class Paths.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Path
{
    /**
     * The NamesGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Migration file path.
     * 
     * @var string
     */
    public $migrationPath;

    /**
     * Create new Paths instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->names = app()->make('NamesGenerate');

        $this->migrationPath = $this->MigrationPath();
    }

    /**
     * Get model file path.
     *
     * @return string
     */
    public function modelPath()
    {
        return config('amranidev.config.model').'/'.$this->names->TableName().'.php';
    }

    /**
     * Get migration file path.
     *
     * @return string
     */
    private function migrationPath()
    {
        $FileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.$this->names->TableNames().'.php';

        return config('amranidev.config.migration').'/'.$FileName;
    }

    /**
     * Get controller file path.
     *
     * @return string
     */
    public function controllerPath()
    {
        $FileName = $this->names->TableName().'Controller.php';

        return config('amranidev.config.controller').'/'.$FileName;
    }

    /**
     * Get index file path.
     *
     * @return string
     */
    public function indexPath()
    {
        return config('amranidev.config.views').'/'.$this->names->TableNameSingle().'/'.'index.blade.php';
    }

    /**
     * Get create file path.
     *
     * @return string
     */
    public function createPath()
    {
        return config('amranidev.config.views').'/'.$this->names->TableNameSingle().'/'.'create.blade.php';
    }

    /**
     * Get show file path.
     *
     * @return string
     */
    public function showPath()
    {
        return config('amranidev.config.views').'/'.$this->names->TableNameSingle().'/'.'show.blade.php';
    }

    /**
     * Get edit file path.
     *
     * @return string
     */
    public function editPath()
    {
        return config('amranidev.config.views').'/'.$this->names->TableNameSingle().'/'.'edit.blade.php';
    }

    /**
     * Get route file path.
     *
     * @return string
     */
    public function routePath()
    {
        return config('amranidev.config.routes');
    }

    /**
     * Get views directory path.
     *
     * @return string
     */
    public function dirPath()
    {
        return config('amranidev.config.views').'/'.$this->names->TableNameSingle();
    }
}
