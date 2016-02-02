<?php

namespace Amranidev\ScaffoldInterface\Generators\HomePageGenerator;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

class HomePageGenerator extends Filesystem
{
    private $Parse;

    public function __construct($Parse)
    {
        $this->Parse = $Parse;
    }

    private function Generate()
    {
        $Parse = $this->Parse;

        return view('scaffold-interface::template.HomePage.HomePage', compact('Parse'))->render();
    }

    public function Burn()
    {
        $this->make(base_path() . '/resources/views/HomePageScaffold.blade.php', $this->Generate());
    }

}
