<?php

namespace Amranidev\ScaffoldInterface;

use Illuminate\Support\Facades\Schema;

/**
 * Class Attribute.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Attribute
{
    /**
     * Table name.
     *
     * @var string
     */
    private $table;

    /**
     * Result.
     *
     * @var array
     */
    private $result = [];

    /**
     * Create new attribute instance.
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
     * @return array
     */
    public function getAttributes()
    {
        //get table attributes
        $this->result = Schema::getColumnListing($this->table);
        //delete the first element, (ignore the id section)
        unset($this->result[0]);
        //get result
        return $this->result;
    }
}
