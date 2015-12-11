<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ModelGenerate
{
    public $dataSystem;

    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create new ModelGenerate instance
     *
     * @param NameGenerate
     */
    public function __construct(NamesGenerate $names, DataSystem $dataSystem)
    {
        $this->names = $names;
        $this->dataSystem = $dataSystem;
    }

    /**
     * fetch model template
     *
     * @return String
     */
    public function generate()
    {
        $TableName = $this->names->TableName();
        $TableNames = $this->names->TableNames();
        $foreignKeys = $this->dataSystem->foreignKeys;
        return "<?php\n" . view('scaffold-interface::template.model.model', compact('TableName', 'TableNames', 'foreignKeys'))->render();
    }
}
