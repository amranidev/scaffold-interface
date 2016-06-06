<?php

namespace Amranidev\ScaffoldInterface\Generators;

use Amranidev\ScaffoldInterface\DataSystem\Datasystem;

/**
 * Class ModelGenerate.
 *
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class ModelGenerate
{
    /**
     * DataSystem.
     *
     * @var
     */
    private $dataSystem;

    /**
     * @var NamesGenerate
     */
    private $names;

    /**
     * Create new ModelGenerate instance.
     *
     * @param NameGenerate
     */
    public function __construct(NamesGenerate $names, Datasystem $dataSystem)
    {
        $this->names = $names;
        $this->dataSystem = $dataSystem;
    }

    /**
     * Compile Model template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.model.model', ['names' => $this->names, 'foreignKeys' => $this->dataSystem->getForeignKeys()])->render();
    }
}
