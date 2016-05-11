<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class     DataSystem
 *
 * @package  scaffold-interface\DataSystem
 * 
 * @author   Amrani Houssain <amranidev@gmail.com>
 *
 */
class DataSystem
{
    /**
     * Main interface reqeust
     *
     * @var $data
     */
    private $data;

    /**
     * on data specification
     *
     * @var $onData
     */
    private $onData;

    /**
     * The forrignKeys and relations
     *
     * @var $foreignKeys
     */
    private $foreignKeys;

    /**
     * Relation Columns
     *
     * @var $relationAttr
     */
    private $relationAttributes;

    /**
     * Create DataSystem instance
     *
     * @param Array Data
     */
    public function __construct($data)
    {
        // unset TableName
        unset($data['TableName']);
        
        // unset template
        unset($data['template']);
        
        $this->data = $data;

        $this->tables($this->data);

        $this->getAttr();
    }

    /**
     * Analyse data and attributes
     *
     * @param Array $data
     */
    private function getAttr()
    {

        foreach ($this->foreignKeys as $key => $value) {
            $Schema = Schema::getColumnListing($value);
            unset($Schema[0]);
            foreach ($Schema as $SchemaKey => $SchemaValue) {
                if (strpos($SchemaValue, '_id')) {
                    unset($Schema[$SchemaKey]);
                }
            }
            $this->relationAttributes[$value] = $Schema;
        }
    }

    /**
     * Analyse data and get ondata specification
     *
     * @param Array $data
     * @todo  optimisation
     */
    private function tables($data)
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

    /**
     * get foreignKeys
     */ 
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * get relation attributes
     */ 
    public function getRelationAttributes()
    {
        return $this->relationAttributes;
    }

    /**
     * get onData
     */ 
    public function getOnData()
    {
        return $this->onData;
    }
}
