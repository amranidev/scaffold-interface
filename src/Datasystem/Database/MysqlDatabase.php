<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

use Illuminate\Support\Facades\DB;

/**
 * class DefaultDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class MysqlDatabase extends Database
{
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))->pluck('Tables_in_scaffold120')->reject(function ($name) {
            return $this->skips()->contains($name);
        });
    }

    public function getQuery()
    {
        return 'SHOW TABLES';
    }

    public function skipNames()
    {
        return collect([]);
    }
}
