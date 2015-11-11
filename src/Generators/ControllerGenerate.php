<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ControllerGenerate
{
    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * @var dataStandard Array
     */
    public $dataS;

    /**
     * Create new ControllerGenerate instance
     *
     * @param $dataS Array
     * @param NamesGenerate
     */
    public function __construct($dataS, NamesGenerate $names)
    {
        $this->names = $names;
        $this->dataS = $dataS;
    }

    /**
     * fetch controller tamplate
     *
     * @return String
     */
    public function generate()
    {
        $TableName = $this->names->TableName();
        $TableNameSingle = $this->names->TableNameSingle();
        $TableNames = $this->names->TableNames();
        $dataS = $this->dataS;

        return "<?php\n" . view('template.controller.controller', compact('TableName', 'TableNameSingle', 'TableNames', 'dataS'))->render();
    }

}
