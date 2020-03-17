<?php

namespace ORM;

use PDO;

class Database{

    public static $DB_NAME = 'searchengine';
    public static $DB_USER = 'searchengine';
    public static $DB_PASSWORD = 'searchengine';
    
    static function GET_PDO()
    {
        return new PDO('mysql:host=localhost;dbname='.Database::$DB_NAME, Database::$DB_USER, Database::$DB_PASSWORD);
    }
}