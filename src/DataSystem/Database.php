<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\DB;

/**
 * calss Database.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Database
{
    /**
     * get all tables names.
     *
     * @return array
     */
    public static function getTablesNames()
    {
        $result = [];

        if (env('DB_CONNECTION') == 'pgsql') {
            $tables = DB::select("SELECT * FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';");

            $result = self::search($tables, 'pgsql');
        } else {
            $tables = DB::select('SHOW TABLES');

            $result = self::search($tables);
        }

        return $result;
    }

    /**
     * search helper.
     *
     * @param array  $table
     * @param string $database
     *
     * @return array
     */
    private static function search(array $tables, $database = 'mysql')
    {
        return collect($tables)->flatMap(function ($row) use ($database) {
            return collect($row)
            ->reject('migrations')
            ->reject('scaffoldinterfaces')
            ->reject('password_resets')
            ->reject(function ($value, $key) use ($database) {
                return $database === 'pgsql' && $key !== 'tablename';
            })
            ->values();
        })->toArray();
    }
}
