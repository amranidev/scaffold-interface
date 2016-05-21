<?php

namespace Amranidev\ScaffoldInterface\Generators\HomePageGenerator;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

class HomePageGenerator extends Filesystem
{
    /**
     * Parser.
     *
     * @var
     */
    private $parse;

    /**
     * Create new HomePageGenerator instance.
     *
     * @param string $parse
     */
    public function __construct($parse)
    {
        $this->parse = $parse;
    }

    /**
     * Generate HomePage.
     */
    private function generate()
    {
        return view('scaffold-interface::template.HomePage.HomePage', ['Parse' => $this->parse])->render();
    }

    /**
     * Save HomePage.
     */
    public function burn()
    {
        $this->make(base_path().'/resources/views/HomePageScaffold.blade.php', $this->generate());
    }
}
