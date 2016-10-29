<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class ViewGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ViewGenerate
{
    /**
     * The DataSystem instance.
     *
     * @var \Amranidev\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The NamesGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $parser;

    /**
     * Create new ViewGenerate instance.
     *
     * @param $data Array
     * @param NamesGenerate
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile index view.
     *
     * @return string
     */
    public function generateIndex()
    {
        return view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.index', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile create view.
     *
     * @return string
     */
    public function generateCreate()
    {
        return view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.create', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile show view.
     *
     * @return string
     */
    public function generateShow()
    {
        return view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.show', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }

    /**
     * Compile edit view.
     *
     * @return string
     */
    public function generateEdit()
    {
        return view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.edit', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
