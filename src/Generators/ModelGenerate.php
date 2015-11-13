<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

class ModelGenerate
{
    /**
     * @var NamesGenerate
     */
    public $names;

    /**
     * Create new ModelGenerate instance
     *
     * @param NameGenerate
     */
    public function __construct(NamesGenerate $names)
    {
        $this->names = $names;
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
        return "<?php\n" . view('template.model.model', compact('TableName', 'TableNames'))->render();
    }
}
