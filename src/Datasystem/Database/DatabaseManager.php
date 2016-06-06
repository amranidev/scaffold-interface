<?php

namespace Amranidev\ScaffoldInterface\Datasystem\Database;

/**
 * class Database.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class DatabaseManager
{
    /**
     * database holder.
     *
     * @var /Amranidev/ScaffoldInterface/DataSystem/DatabaseContract
     */
    protected $database;

    public function __construct(DatabaseContractInterface $database)
    {
        $this->database = $database;
    }

    /**
     * new instance based on app's database driver.
     *
     * @return self
     */
    public static function make()
    {
        $class = str_replace(
            'DatabaseManager',
            ucfirst(config('database.default')).'Database',
            self::class
        );

        try {
            return new self(new $class());
        } catch (\Exception $e) {
            return new self(new MysqlDatabase());
        }
    }

    /**
     * retrieve table names from database.
     *
     * @return /Illuminate/Support/Collection
     */
    public static function tableNames()
    {
        return self::make()->getTablesNames();
    }

    /**
     * get all tables names.
     *
     * @return /Illuminate/Support/Collection
     */
    public function getTablesNames()
    {
        return $this->database->tableNames();
    }
}
