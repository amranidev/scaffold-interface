<?php

namespace Amranidev\ScaffoldInterface\Generators;

/**
 * Class RouteGenerate.
 *
 * @author Amrani Houssian <amranidev@gmailcom>
 */
class RouteGenerate
{
    /**
     * The NamesGenerate instance.
     * 
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Create new RouteGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->names = app()->make('NamesGenerate');
    }

    /**
     * Compile route template.
     *
     * @return string
     */
    public function generate()
    {
        return "\n".view('scaffold-interface::template.routes', ['names' => $this->names])->render();
    }
}
