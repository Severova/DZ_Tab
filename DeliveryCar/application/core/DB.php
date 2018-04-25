<?php

namespace application\core;

class Db{

    protected $pdo;
    protected  static $instance;

    private function __construct() {
        $db = require_once $_SERVER['DOCUMENT_ROOT'].'/config/configDB.php';
        $this->pdo = new \PDO($db['dsn'], $db['username'], $db['password']);
    }

    public static function instance() {
        if(is_null(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance->pdo;
    }


}