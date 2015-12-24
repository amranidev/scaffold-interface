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
     */
    private function Tables($data)
    {
        $tmp = '';
        $this->onData = [];
        $this->foreignKeys = [];
        $i = 0;
        $j = 0;
        foreach ($data as $key => $value) {

            if ($key == 'tbl' . $i) {
                $tmp = $value;
                if (in_array($value, $this->foreignKeys)) {
                    throw new \Exception($value . " Relation Already selected");
                }
                array_push($this->foreignKeys, $value);
                $i++;

            } elseif ($key == 'on' . $j) {
                if (!in_array($value, Schema::getColumnListing($tmp))) {
                    throw new \Exception($value . " Does not exist in " . $tmp);
                }
                array_push($this->onData, $value);
                $j++;
            }
        }
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

        if ($spec == 'migration') {
            $i = 0;
        } else {
            $i = 1;
        }
        $request = [];
        foreach ($this->data as $key => $value) {
            if ($i == 1) {
                $i = 0;
            } elseif ($i == 0) {
                if ($key == 'tbl0' or $key == 'on0') {break;} else {
                    array_push($request, str_slug($value, '_'));
                    $i = 1;
                }
            }
        }

        return $request;
    }
}
