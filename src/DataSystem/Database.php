<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\DB;

/**
 * calss Database
 * 
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Database
{
    /**
     * get all tables names.
     * 
     * @return Array $result
     */
    public static function getTablesNames()
    {
        $result = [];

        if (env('DB_CONNECTION') == 'pgsql') {

            $tables = DB::select("SELECT * FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';");

            $result = self::search($tables,'pgsql');
        } else {

            $tables = DB::select('SHOW TABLES');

            $result = self::search($tables);
        }

        return $result;
    }

    /**
     * search helper
     * 
     * @return Array $result
     */ 
    private static function search(array $tables, $database = "mysql")
    {
    	$result = [];

        foreach ($tables as $row) {
            foreach ($row as $key => $value) {
                if ($value != 'migrations' && $value != 'scaffoldinterfaces' && $value != 'password_resets') {
                    if ($database == "pgsql") {
                        if ($key == 'tablename') {
                            $result[] = $value;
                        }
                    } else {
                        $result[] = $value;
                    }
                }
            }
        }

        return $result;
    }
}
