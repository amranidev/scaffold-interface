<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

/**
 * Interface DatabaseContract.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
interface DatabaseContractInterface
{
    /**
     * retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tableNames();
}
