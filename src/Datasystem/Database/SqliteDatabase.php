<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

/**
 * class SqliteDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class SqliteDatabase extends Database
{
    /**
     * sqlite query.
     *
     * @return string
     */
    public function getQuery()
    {
        return "SELECT name FROM sqlite_master WHERE type='table'";
    }

    /**
     * skip unused schemas.
     *
     * @return /Illuminate/Support/Collection
     */
    public function skipNames()
    {
        return collect([
            'sqlite_sequence',
        ]);
    }
}
