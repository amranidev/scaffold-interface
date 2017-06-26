<?php

namespace Amranidev\ScaffoldInterface\ManyToMany;

use Amranidev\ScaffoldInterface\Filesystem\Filesystem;

/**
 * Class ManyToMany.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class ManyToMany extends Filesystem
{
    /**
     * Request.
     *
     * @var array
     */
    private $request;

    /**
     * Tables.
     *
     * @var array
     */
    private $tables;

    /**
     * create new ManyToMany instance.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
        $this->tables = $this->order();
    }

    /**
     * Determine which table is ordered alphabetically.
     *
     * @return array $tables
     */
    private function order()
    {
        $result = [];

        $data = $this->request;

        if ($data['table1'] > $data['table2']) {
            $result['first'] = $data['table2'];
            $result['second'] = $data['table1'];
        } else {
            $result['first'] = $data['table1'];
            $result['second'] = $data['table2'];
        }

        return $result;
    }

    /**
     * Add relationships methods to models.
     *
     * @return void
     */
    private function model()
    {
        $this->relationship(config('amranidev.config.model').DIRECTORY_SEPARATOR.ucfirst(str_singular($this->tables['first'])).'.php', $this->tables['second']);
        $this->relationship(config('amranidev.config.model').DIRECTORY_SEPARATOR.ucfirst(str_singular($this->tables['second'])).'.php', $this->tables['first']);
    }

    /**
     * Make migration file.
     *
     * @return void
     */
    private function migration()
    {
        $migrationContent = "<?php\n\n".view('scaffold-interface::template.ManyToMany.migration', $this->tables)->render();

        $migrationFileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.ucfirst($this->tables['first']).ucfirst($this->tables['second']).'.php';

        $this->make(config('amranidev.config.migration').'/'.$migrationFileName, $migrationContent);
    }

    /**
     * Generate relationships methods.
     *
     *  @return bool
     */
    private function relationship($path, $model)
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES);
        $last = count($lines) - 1;
        unset($lines[$last]);
        $result = implode("\n", array_values($lines));
        $model = view('scaffold-interface::template.ManyToMany.model', ['model' => $model])->render();
        $result = $result."\n\n\t".$model."\n".'}'."\n";

        return file_put_contents($path, $result);
    }

    /**
     * Generate ManyToMany.
     *
     * @return void
     */
    public function burn()
    {
        $this->model();
        $this->migration();
    }
}
