<?php

namespace Amranidev\ScaffoldInterface;

use Illuminate\Support\Facades\Schema;

/**
 * class Attribute
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 *
 * @todo Test
 */
class Attribute
{

    /**
     * table name
     *
     * @var $table String
     */
    private $table;

    /**
     * Result
     *
     * @var $Result[]
     */
    private $result = [];

    /**
     * create new Attrebutes
     *
     * @param $table
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Get attributes from table
     *
     * @return mixed
     */
    public function getAttributes()
    {
        //get table attributes
        $this->result = Schema::getColumnListing($this->table);
        //delete the first element.(ignore the id section)
        unset($this->result[0]);
        //get result
        return $this->result;
    }
}
