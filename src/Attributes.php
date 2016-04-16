<?php
namespace Amranidev\ScaffoldInterface;

use Illuminate\Support\Facades\DB;

/**
 * class Attributes
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 *
 * @todo Test
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

        if (env('DB_CONNECTION') == 'mysql') {

            $this->result = DB::select(DB::raw('show columns from `' . $this->table . '`;'));

        } elseif (env('DB_CONNECTION') == 'pgsql') {

            $this->result = DB::select(DB::raw("SELECT column_name FROM information_schema.columns WHERE table_name ='" . $this->table . "';"));
        }

        //delete the first element.(ignore the id section)
        unset($this->result[0]);

        //get result
        return $this->result;
    }
}
