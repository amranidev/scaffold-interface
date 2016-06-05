<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

/**
 * class SqliteDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class SqliteDatabase extends Database
{
    public function getQuery()
    {
        return "SELECT name FROM sqlite_master WHERE type='table'";
    }

    public function skipNames()
    {
        return collect([
            'sqlite_sequence',
        ]);
    }
}
