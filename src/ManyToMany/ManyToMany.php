<?php

namespace Amranidev\ScaffoldInterface\ManyToMany;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

/**
 * class ManyToMany
 * 
 * @deprecated Not used by internal and not recommended
 */
class ManyToMany extends Filesystem
{
    private $request;

    private $tables;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->tables = $this->attributes();
    }
    
    public function attributes()
    {
        $result = [];

        $data = $this->request;

        if ($data['table1'][0] > $data['table2'][0]) {
            $result['first'] = $data['table2'];
            $result['second'] = $data['table1'];
        } else {
            $result['first'] = $data['table1'];
            $result['second'] = $data['table2'];
        }

        return $result;
    }

    public function burn()
    {
    }

    public function model()
    {
        $this->relationship(app_path(ucfirst(str_singular($this->tables['first']))) .".php", $this->tables['second']);
        $this->relationship(app_path(ucfirst(str_singular($this->tables['second']))) .".php", $this->tables['first']);
    }

    public function migration()
    {
        $migrationContent = view('scaffold-interface::template.ManyToMany.migration', $this->tables)->render();

        $migrationFileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.ucfirst($this->tables['first']).ucfirst($this->tables['second']).'.php';
 
        $this->make(config('amranidev.config.migration').'/'.$migrationFileName, $migrationContent);
    }

    public function relationship($path, $model)
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES);
        $last = sizeof($lines) - 1;
        unset($lines[$last]);
        $result = implode("\n", array_values($lines));
        $model = view('scaffold-interface::template.ManyToMany.model', ['model' => $model])->render();
        $result = $result. "\n\n\t" . $model . "\n" . '}' . "\n";

        return file_put_contents($path, $result);
    }

    public function getRequest()
    {
        return $this->request;
    }
}
