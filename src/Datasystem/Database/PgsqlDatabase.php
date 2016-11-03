<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

use Illuminate\Support\Facades\DB;

/**
 * Class PgsqlDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class PgsqlDatabase extends Database
{
    /**
     * retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))
                    ->pluck('tablename')->reject(function ($name) {
                        return $this->skips()->contains($name);
                    });
    }

    /**
     * postgres query.
     *
     * @return string
     */
    public function getQuery()
    {
        return "SELECT * FROM pg_catalog.pg_tables WHERE
            schemaname != 'pg_catalog' AND schemaname != 'information_schema'";
    }

    /**
     * skip unused schemas.
     *
     * @return \Illuminate\Support\Collection
     */
    public function skipNames()
    {
        return collect([]);
    }
}
