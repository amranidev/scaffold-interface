<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class     DataSystem
 *
 * @package  scaffold-interface\DataSystem
 * @author   Amrani Houssain <amranidev@gmail.com>
 *
 * @todo     Testing
 */
class DataSystem
{

    /**
     * Main interface reqeust
     *
     * @var $data
     */
    public $data;

    /**
     * on data specification
     *
     * @var $onData
     */
    public $onData;

    /**
     * Data For views
     *
     * @var $viewData
     */
    public $viewData;

    /**
     * Data for migration
     *
     * @var $migrationData
     */
    public $migrationData;

    /**
     * The forrignKeys and relations
     *
     * @var $foreignKeys
     */
    public $foreignKeys;

    /**
     * Relation Columns
     *
     * @var $relationAttr
     */
    public $relationAttr;

    /**
     * Create DataSystem instance
     *
     * @param Array Data
     */
    public function __construct($data)
    {
        unset($data['TableName']);
        $this->data = $data;
        $this->migrationData = $this->dataScaffold('migration');
        $this->viewData = $this->dataScaffold('v');
        $this->Tables($this->data);
        $this->getAttr($this->data);

        //dd($this->dataScaffold($this->data, 'migration'));
    }

    /**
     * Analyse data and attributes
     *
     * @param Array $data
     */
    private function getAttr($data)
    {

        foreach ($this->foreignKeys as $key => $value) {
            $Schema = Schema::getColumnListing($value);
            unset($Schema[0]);
            foreach ($Schema as $SchemaKey => $SchemaValue) {
                if (strpos($SchemaValue, '_id')) {
                    unset($Schema[$SchemaKey]);
                }
            }
            $this->relationAttr[$value] = $Schema;
        }

    }

    /**
     * Analyse data and get ondata specification
     *
     * @param Array $data
     * @todo  optimisation
     */
    private function Tables($data)
    {
        $tmp = getTables($data);

        $this->onData = $tmp[0];

        $this->foreignKeys = $tmp[1];
    }

    /**
     * Data for migration and views
     *
     * @param String specification
     *
     * @return Array $request
     */
    public function dataScaffold($spec)
    {
        return dataScaffold($this->data, $spec);
    }
}
