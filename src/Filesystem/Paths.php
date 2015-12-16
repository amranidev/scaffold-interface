<?php
namespace Amranidev\ScaffoldInterface\Filesystem;

use Amranidev\ScaffoldInterface\Generators\NamesGenerate;

/**
 * Class Paths
 *
 * @package scaffold-interface/FileSystem
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class Paths
{
    /**
     * The NamesGenerate instance
     */
    public $names;

    /**
     * Create new Paths instance
     *
     * @param NamesGenerate names
     */
    public function __construct(NamesGenerate $names)
    {
        $this->names = $names;
    }

    /**
     * return model file path
     *
     * @return String
     */
    public function ModelPath()
    {
        return app_path() . "/" . $this->names->TableName() . '.php';
    }

    /**
     * return migration file path
     *
     * @return String
     */
    public function MigrationPath()
    {
        $FileName = date('Y') . '_' . date('m') . '_' . date('d') . '_' . date('his') . '_' . $this->names->TableNames() . ".php";
        return database_path() . "/migrations/" . $FileName;
    }

    /**
     * return controller file path
     *
     * @return String
     */
    public function ControllerPath()
    {
        $FileName = $this->names->TableName() . "Controller.php";
        return base_path() . "/app/Http/Controllers/" . $FileName;
    }

    /**
     * retrun index file path
     *
     * @return String
     */
    public function IndexPath()
    {
        return base_path() . '/resources/views/' . $this->names->TableNameSingle() . '/' . 'index.blade.php';
    }

    /**
     * return create file path
     *
     * @return String
     */
    public function CreatePath()
    {
        return base_path() . '/resources/views/' . $this->names->TableNameSingle() . '/' . 'create.blade.php';
    }

    /**
     * return show file path
     *
     * @return String
     */
    public function ShowPath()
    {
        return base_path() . '/resources/views/' . $this->names->TableNameSingle() . '/' . 'show.blade.php';
    }

    /**
     * return edit file path
     *
     * @return String
     */
    public function EditPath()
    {
        return base_path() . '/resources/views/' . $this->names->TableNameSingle() . '/' . 'edit.blade.php';
    }

    /**
     * return route file path
     *
     * @return String
     */
    public function RoutePath()
    {
        return base_path() . "/app/Http/routes.php";
    }

    /**
     * return views directory path
     *
     * @return String
     */
    public function DirPath()
    {
        return base_path() . '/resources/views/' . $this->names->TableNameSingle();
    }
}
