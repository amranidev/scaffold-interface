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
     * Excluded columns.
     * 
     * @var array
     */
    private $exclude = ['id', 'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'];

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
        return collect(Schema::getColumnListing($this->table))->filter(function($column) {
            return ! in_array($column, $this->exclude);
        });
    }
}
