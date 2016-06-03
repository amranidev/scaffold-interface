<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\DB;

class GetTables
{
    public static function getTable()
    {
        $result = [];

        if (env('DB_CONNECTION') == 'pgsql') {
            $tables = DB::select("SELECT * FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';");
            foreach ($tables as $value) {
                foreach ($value as $key1 => $value1) {
                    if ($value1 != 'migrations' && $value1 != 'scaffoldinterfaces' && $value1 != 'password_resets') {
                        if ($key1 == 'tablename') {
                            $result[] = $value1;
                        }
                    }
                }
            }
        } else {
            $tables = DB::select('SHOW TABLES');
            foreach ($tables as $value) {
                foreach ($value as $key1 => $value1) {
                    if ($value1 != 'migrations' && $value1 != 'scaffoldinterfaces' && $value1 != 'password_resets') {
                        $result[] = $value1;
                    }
                }
            }
        }

        return $result;
    }
}
