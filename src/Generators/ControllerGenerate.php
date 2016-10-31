<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class ControllerGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ControllerGenerate
{
    /**
     * The DataSystem instance.
     *
     * @var \Amranidev\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The Parser instance.
     *
     * @var \Amranidev\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Create new ControllerGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile controller tamplate.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.controller.controller', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
