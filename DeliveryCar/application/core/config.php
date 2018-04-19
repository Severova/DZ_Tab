<?php

namespace application\core;

class Config{
    static $database = array(
        'default' => array(
            'dsn' => 'mysql:dbname=Car_db;host=localhost',
            'login' => 'root',
            'password' => ''
        )
    );
}