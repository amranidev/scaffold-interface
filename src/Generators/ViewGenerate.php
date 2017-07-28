<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class ViewGenerate.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ViewGenerate implements GeneratorInterface
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
     * @var \Amranidev\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * The Indenter instance.
     *
     * @var \Gajus\Dindent\Indenter
     */
    private $indenter;

    /**
     * Create new ViewGenerate instance.
     *
     * @param $data Array
     * @param NamesGenerate
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
        $this->indenter = app()->make('Indenter');
    }

    /**
     * Compile index view.
     *
     * @return string
     */
    private function generateIndex()
    {
        return $this->indenter
            ->indent(view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.index',
                ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render());
    }

    /**
     * Compile create view.
     *
     * @return string
     */
    private function generateCreate()
    {
        return $this->indenter
            ->indent(view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.create',
                ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render());
    }

    /**
     * Compile show view.
     *
     * @return string
     */
    private function generateShow()
    {
        return $this->indenter
            ->indent(view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.show',
                ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render());
    }

    /**
     * Compile edit view.
     *
     * @return string
     */
    private function generateEdit()
    {
        return $this->indenter
            ->indent(view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.edit',
                ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render());
    }

    /**
     * Generate Views.
     *
     * @return array
     */
    public function generate()
    {
        return [
            'index'  => $this->generateIndex(),
            'create' => $this->generateCreate(),
            'edit'   => $this->generateEdit(),
            'show'   => $this->generateShow(),
        ];
    }
}
