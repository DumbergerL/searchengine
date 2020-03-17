<?php

namespace ORM;

use PDO;

class Database{

    public static $DB_NAME = 'searchengine';
    public static $DB_USER = 'root';
    public static $DB_PASSWORD = '';
    
    static function GET_PDO()
    {
        return new PDO('mysql:host=localhost;dbname='.Database::$DB_NAME, Database::$DB_USER, Database::$DB_PASSWORD);
    }

    static function SELECT($sqlStatement)
    {
        $statement = Database::GET_PDO()->prepare($sqlStatement);
        $statement->execute();
        return $statement->fetchAll();
    }
}