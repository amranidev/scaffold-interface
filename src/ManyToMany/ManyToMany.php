<?php

namespace Amranidev\ScaffoldInterface\ManyToMany;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

/**
 * class ManyToMany.
 *
 * @deprecated Not used by internal and not recommended
 */
class ManyToMany extends Filesystem
{
    private $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function burn()
    {
        $data = $this->request;
        $first = $data['table1'];
        $second = $data['table2'];
        if ($data['table1'][0] > $data['table2'][0]) {
            $first = $data['table2'];
            $second = $data['table1'];
        }
        $content = view('scaffold-interface::template.ManyToMany.migration', compact('first', 'second'))->render();

        $FileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.ucfirst($first).ucfirst($second).'.php';

        $this->make(config('amranidev.config.migration').'/'.$FileName, $content);
    }

    public function getRequest()
    {
        return $this->request;
    }
}
