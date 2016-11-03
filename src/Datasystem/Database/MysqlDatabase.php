<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

use Illuminate\Support\Facades\DB;

/**
 * Class DefaultDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class MysqlDatabase extends Database
{
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))->pluck('Tables_in_'.env('DB_DATABASE'))->reject(function ($name) {
            return $this->skips()->contains($name);
        });
    }

    /**
     * Mysql query.
     *
     * @return string
     */
    public function getQuery()
    {
        return 'SHOW TABLES';
    }

    /**
     * Skip unused schemas.
     *
     * @return \Illuminate\Support\Collection
     */
    public function skipNames()
    {
        return collect([]);
    }
}
