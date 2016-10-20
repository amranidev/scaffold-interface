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
     * The NamesGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Create new ControllerGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->names = app()->make('NamesGenerate');
    }

    /**
     * Compile controller tamplate.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.controller.controller', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
