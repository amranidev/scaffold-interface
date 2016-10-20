<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class ModelGenerate.
 *
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class ModelGenerate
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
     * Create new ModelGenerate instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->names = app()->make('NamesGenerate');
        $this->dataSystem = app()->make('Datasystem');
    }

    /**
     * Compile model template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.model.model', ['names' => $this->names, 'dataSystem' => $this->dataSystem])->render();
    }
}
