<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

use Illuminate\Support\Facades\DB;

/**
 * class PgsqlDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class PgsqlDatabase extends Database
{
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))
                    ->pluck('tablename')->reject(function ($name) {
                        return $this->skips()->contains($name);
                    });
    }

    public function getQuery()
    {
        return "SELECT * FROM pg_catalog.pg_tables WHERE
            schemaname != 'pg_catalog' AND schemaname != 'information_schema'";
    }

    public function skipNames()
    {
        return collect([]);
    }
}
