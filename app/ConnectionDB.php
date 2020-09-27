<?php
namespace App;

class ConnectionDB
{
    private static $link;
 
    private function __construct(){}
 
    public static function getInstance()
    {
        if (is_null(self::$link)) {
            self::$link = new \PDO('mysql:host='.DB_SERVER.';port=3306;dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            self::$link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$link->exec('set names utf8');
        }
        return self::$link;
    }
}