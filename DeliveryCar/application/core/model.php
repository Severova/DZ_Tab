<?php

namespace application\core;

use PDO;


abstract class Model extends Config {

    static $db;
    public $attributes = [];

    public function __construct($params = [])
    {
        $config = Config::$database['default'];

        try{
            if (is_null(Model::$db)) {
                Model::$db = new PDO($config['dsn'], $config['login'], $config['password']);
            }
        }
        catch (PDOException $e){
            echo 'Подключение не удалось: ' . $e->getMessage();
        }


        foreach ($params as $param_name => $param_value){

            if (property_exists(static::class, $param_name ))
            {
                $this->$param_name = $param_value;
            } else
                {
                    $sFuncName = 'set'.ucfirst($param_name);
                    //if (method_exists($this,$sFuncName ))
                    $this->$sFuncName($param_value);
                }
        }
    }

    public function __get($name)
    {
        $sFuncName = 'get'.ucfirst($name);
            return $this->$sFuncName();
    }

    public function __set($name,$value)
    {
        $sFuncName = 'set'.ucfirst($name);
            $this->$sFuncName($value);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return isset($this->attributes['id'])? $this->attributes['id'] : null;
    }


    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->attributes['id'] = $id;
        return $this;

    }

    static function TableName(){

        return explode('\\', strtolower(static::class))[2];
    }

    /**
     * @param integer $id
     * @return static|null
     */
    public static function findById($id){

        $table = static::TableName();

        $oQuery = Model::$db->prepare("SELECT * FROM {$table} WHERE id=:need_id");
        $oQuery->execute(['need_id' => $id]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    public static function findList($category){

        $table = static::TableName();

        $oQuery = Model::$db->prepare("SELECT {$category} FROM {$table}");
        $oQuery->execute();
        $aRes = $oQuery->fetchAll(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    public static function findAllObj(){

        $table = static::TableName();

        $oQuery = Model::$db->prepare("SELECT * FROM {$table}");
        $oQuery->execute();
        $aRes = $oQuery->fetchAll(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    /**
     * @param string $what
     * @param string $toWhich
     * @return null|static
     */

    public static function findLineByCategory($what, $toWhich){

        $table = static::TableName();

        $oQuery = Model::$db->prepare("SELECT * FROM {$table} WHERE $what=:need_what");
        $oQuery->execute(['need_what' => $toWhich]);
        $aRes = $oQuery->fetch(PDO::FETCH_ASSOC);

        return $aRes? new static($aRes):null;
    }

    /**
     * @param string $category
     * @param string $what
     * @param string $toWhich
     * @return mixed
     */
    public static function getListByCategory($category, $what, $toWhich){

        $table = static::TableName();

        $oQuery = Model::$db->prepare("SELECT $category FROM {$table} WHERE $what=:need_what");
        $oQuery->execute(['need_what' => $toWhich]);
        $aRes = $oQuery->fetchAll(PDO::FETCH_COLUMN);

        return count($aRes)>1? $aRes : $aRes[0];
    }

    /**
     * @param string $category
     * @param string $what
     * @param string $toWhich
     * @return object|null
     */

    public static function getListObjectByCategory ($category, $what, $toWhich){

        $aRes = static::getListByCategory($category, $what, $toWhich);
        $results = [];

        if (count($aRes) > 1){
            foreach ($aRes as $value) {
                $results[] = new static(static::findLineByCategory($category, $value));
            }
        } elseif (count($aRes) == 0) {
            return null;
        } else {
            $results[] = new static(static::findLineByCategory($category, $aRes));
        }

        return $results;
    }

    protected function insert(){
        $table = static::TableName();
        $aLabels = [];
        $aValues = [];

        foreach ( $this->attributes as $name => $value){
            $aLabels[] = $name;
            $aValues[] = ':'.$name;
        }

        $sLabels = implode(',',$aLabels);
        $sValues = implode(',',$aValues);

        $query = self::$db->prepare("INSERT INTO  {$table} ({$sLabels}) VALUES ($sValues) ");
        $query->execute($this->attributes);

        if ($iId = self::$db->lastInsertId())
            $this->setId($iId);
    }

    protected function update(){
        $table = static::TableName();
        $aUpdates = [];

        foreach ( $this->attributes as $name => $value){
            if ($name == 'id') continue;
            $aUpdates[] = $name.'=:'.$name;
        }

        $sUpdates = implode(', ',$aUpdates);

        $query = self::$db->prepare("UPDATE  {$table} SET {$sUpdates} WHERE id=:id");
        $query->execute($this->attributes);
    }

    public function save(){
        if ($this->id)
            $this->update();
        else
            $this->insert();
    }

    public function __call($methodName, $params)
    {
        $methodPrefix = substr($methodName, 0, 3);
        $name = lcfirst(substr($methodName, 3));

        if ($methodPrefix == 'set')
        {
            $this->attributes[$name] = $params[0];

            return $this;

        }
        elseif ($methodPrefix == 'get')
        {
            return isset($this->attributes[$name])? $this->attributes[$name] : null;
        }
        return null;

    }
}