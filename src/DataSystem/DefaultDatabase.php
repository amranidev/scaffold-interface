<?php

namespace Amranidev\ScaffoldInterface\DataSystem;

/**
 * class DefaultDatabase.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class DefaultDatabase extends Database
{
    public function getQuery()
    {
        return 'SHOW TABLES';
    }

    public function skipNames()
    {
        return collect([]);
    }
}
