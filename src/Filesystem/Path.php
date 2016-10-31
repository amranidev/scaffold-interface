<?php

namespace Amranidev\ScaffoldInterface\Filesystem;

/**
 * Class Paths.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Path
{
    /**
     * The Parser instance.
     *
     * @var \Amranidev\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

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
        $this->parser = app()->make('Parser');

        $this->migrationPath = $this->MigrationPath();
    }

    /**
     * Get model file path.
     *
     * @return string
     */
    public function modelPath()
    {
        return config('amranidev.config.model').'/'.ucfirst($this->parser->singular()).'.php';
    }

    /**
     * Get migration file path.
     *
     * @return string
     */
    private function migrationPath()
    {
        $FileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.$this->parser->plural().'.php';

        return config('amranidev.config.migration').'/'.$FileName;
    }

    /**
     * Get controller file path.
     *
     * @return string
     */
    public function controllerPath()
    {
        $FileName = ucfirst($this->parser->singular()).'Controller.php';

        return config('amranidev.config.controller').'/'.$FileName;
    }

    /**
     * Get index file path.
     *
     * @return string
     */
    public function indexPath()
    {
        return config('amranidev.config.views').'/'.$this->parser->singular().'/'.'index.blade.php';
    }

    /**
     * Get create file path.
     *
     * @return string
     */
    public function createPath()
    {
        return config('amranidev.config.views').'/'.$this->parser->singular().'/'.'create.blade.php';
    }

    /**
     * Get show file path.
     *
     * @return string
     */
    public function showPath()
    {
        return config('amranidev.config.views').'/'.$this->parser->singular().'/'.'show.blade.php';
    }

    /**
     * Get edit file path.
     *
     * @return string
     */
    public function editPath()
    {
        return config('amranidev.config.views').'/'.$this->parser->singular().'/'.'edit.blade.php';
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
        return config('amranidev.config.views').'/'.$this->parser->singular();
    }
}
