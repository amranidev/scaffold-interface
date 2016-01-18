<?php
namespace Amranidev\ScaffoldInterface;

use Illuminate\Support\Facades\DB;

/**
 * class Attributes
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Attributes
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
    public $result = [];
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
     */
    public function getAttributes()
    {
        //select all the Attributes from table
        $this->result = DB::select(DB::raw('show columns from `' . $this->table . '`;'));
        //delete the first element.(ignore the id section)
        unset($this->result[0]);
        //get result
        return $this->result;
    }
}
