<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class RouteGenerate.
 *
 * @author Amrani Houssian amranidev@gmailcom
 */
class RouteGenerate implements GeneratorInterface
{
    /**
     * The Parser instance.
     *
     * @var \Amranidev\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Create new RouteGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile route template.
     *
     * @return string
     */
    public function generate()
    {
        return "\n".view('scaffold-interface::template.routes', ['parser' => $this->parser])->render();
    }
}
