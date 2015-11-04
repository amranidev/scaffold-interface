<?php
namespace Amranidev\ScaffoldInterface;

use Amranidev\ScaffoldInterface\Scaffoldf;

class Scaffold extends ScaffoldTools
{
    
    /**
     * main Reqeust
     *
     * @var $Reqeust Array
     */
    public $Reqeust;
    
    /**
     * Table Name first char upper
     *
     * @var $TableName String
     */
    public $TableName;
    
    /**
     * Table name for migration class
     *
     * @var $TableNameMigration String
     */
    
    public $TableNameMigration;
    
    /**
     * Table Name plurar
     *
     * @var $TableNames String
     */
    
    public $TableNames;
    
    /**
     * Table name singular
     *
     * @var $TableNames String
     */
    public $TableNameSingle;
    
    public $MigrationFile;
    Public $ModelFile;
    Public $ControllerFile;
    public $ViewsDir;

    function __construct($data) {
        
        $this->TableNames = $data['TableName'];
        $this->TableNameMigration = ucfirst($this->TableNames);
        $this->TableName = substr($this->TableNameMigration, 0, -1);
        $this->TableNameSingle = substr($this->TableNames, 0, -1);
        unset($data['TableName']);
        $this->Reqeust = $data;
    }

    
    public function Migration() {
        
        $content = $this->Schema($this->Reqeust, $this->TableNameMigration, $this->TableNames);
        $FileName = date('Y') . '_' . date('m') . '_' . date('d') . '_' . date('his') . '_' . $this->TableNames . ".php";
        $fileLocation = database_path() . "/" . "migrations" . "/" . $FileName;
        $this->MigrationFile = $fileLocation;
        $this->FileCreate($content, $fileLocation);
    }
    public function Model() {
        $content = $this->ModelTxt($this->TableName);
        $FileName = $this->TableName . ".php";
        $fileLocation = app_path() . "/" . $FileName;
        $this->FileCreate($content, $fileLocation);
        $this->ModelFile = $fileLocation;
    }
    
    public function ViewIndex() {
        $content = $this->vIndex($this->Reqeust, $this->TableName, $this->TableNameSingle, $this->TableNames);
        $DirName = $this->TableNameSingle;
        $this->ViewsDir = base_path() . '/resources/views/'.$DirName;
        mkdir(base_path() . '/resources/views/' . $DirName);
        $FileName = 'index.blade.php';
        $fileLocation = base_path() . '/resources/views/' . $DirName . '/' . $FileName;
        $this->FileCreate($content, $fileLocation);
    }
    public function ViewCreate() {
        $content = $this->vCreate($this->Reqeust, $this->TableName, $this->TableNameSingle);
        $DirName = $this->TableNameSingle;
        $FileName = 'create.blade.php';
        $fileLocation = base_path() . '/resources/views/' . $DirName . '/' . $FileName;
        $this->FileCreate($content, $fileLocation);
    }
    public function ViewEdit() {
        $content = $this->vEdit($this->Reqeust, $this->TableName, $this->TableNameSingle);
        $DirName = $this->TableNameSingle;
        
    
        $FileName = 'edit.blade.php';
        $fileLocation = base_path() . '/resources/views/' . $DirName . '/' . $FileName;
        $this->FileCreate($content, $fileLocation);
    }
    public function ViewShow() {
        $content = $this->vShow($this->Reqeust, $this->TableName, $this->TableNameSingle);
        $DirName = $this->TableNameSingle;
        $FileName = 'show.blade.php';
        $fileLocation = base_path() . '/resources/views/' . $DirName . '/' . $FileName;
        $this->FileCreate($content, $fileLocation);
    }
    public function Controller() {
        $content = $this->GenerateController($this->Reqeust, $this->TableName, $this->TableNameSingle, $this->TableNames);
        $FileName = $this->TableName . "Controller.php";
        $fileLocation = base_path() . "/app/Http/Controllers/" . $FileName;
        $this->ControllerFile = $fileLocation;
        $file = fopen($fileLocation, "w");
        fwrite($file, $content);
        fclose($file);
    }
    public function Route() {
        $content = $this->GenerateRoute($this->TableName, $this->TableNameSingle);
        $file = base_path() . "/app/Http/routes.php";
        file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
    }

}
