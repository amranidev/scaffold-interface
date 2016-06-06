<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Datasystem\Datasystem;

/**
 * Class ControllerGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ControllerGenerate
{
    /**
     * DataSystem Instance.
     *
     * @var dataSystem
     */
    private $dataSystem;

    /**
     * @var NamesGenerate
     */
    private $names;

    /**
     * Create new ControllerGenerate instance.
     *
     * @param $dataS Array
     * @param NamesGenerate
     */
    public function __construct(NamesGenerate $names, Datasystem $dataSystem)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
    }

    /**
     * compile controller tamplate.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.controller.controller', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
