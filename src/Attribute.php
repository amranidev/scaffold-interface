<?php

namespace Amranidev\ScaffoldInterface;

use Illuminate\Support\Facades\Schema;

/**
 * class Attribute.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Attribute
{
    /**
     * table name.
     *
     * @var string
     */
    private $table;

    /**
     * Result.
     *
     * @var[]
     */
    private $result = [];

    /**
     * create new attribute instance.
     *
     * @param $table
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Get attributes from an existing table.
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
