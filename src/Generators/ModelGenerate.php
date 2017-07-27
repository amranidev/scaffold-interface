<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class ModelGenerate.
 *
 * @author Amrani Houssian <amranidev@gmail.com>
 */
class ModelGenerate implements GeneratorInterface
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
     * Create new ModelGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile model template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.model.model', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
