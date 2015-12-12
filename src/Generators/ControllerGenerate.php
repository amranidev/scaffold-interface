<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class ControllerGenerate
 *
 * @package scaffold-interface
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ControllerGenerate
{

    /**
     * DataSystem Instance
     *
     * @var dataSystem
     */
    public $dataSystem;

    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create new ControllerGenerate instance
     *
     * @param $dataS Array
     * @param NamesGenerate
     */
    public function __construct(NamesGenerate $names, DataSystem $dataSystem)
    {
        $this->dataSystem = $dataSystem;
        $this->names = $names;
    }

    /**
     * compile controller tamplate
     *
     * @return String
     */
    public function generate()
    {

        $names = $this->names;
        $dataSystem = $this->dataSystem;

        return "<?php\n" . view('scaffold-interface::template.controller.controller', compact('names', 'dataSystem'))->render();

    }

}
