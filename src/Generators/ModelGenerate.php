<?php
namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\DataSystem;
use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class ModelGenerate
 *
 * @package scaffold-interface/Generators
 * @author Amrani Houssian <amranidev@gmail.com>
 */
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
     * Compile Model template
     *
     * @return String
     */
    public function generate()
    {
        $names = $this->names;
        $foreignKeys = $this->dataSystem->foreignKeys;
        return "<?php\n" . view('scaffold-interface::template.model.model', compact('names', 'foreignKeys'))->render();
    }
}
