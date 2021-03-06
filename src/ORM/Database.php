<?php

namespace ORM;

use PDO;

class Database{

    public static $DB_NAME = 'searchengine';
    public static $DB_USER = 'root';
    public static $DB_PASSWORD = '';
    public static $DB_HOST = 'localhost';
    
    public static $PDO = null;

    static function GET_PDO()
    {
        return;
    }

    static function SELECT($sqlStatement)
    {
        $statement = Database::$PDO->prepare($sqlStatement);
        $statement->execute();
        return $statement->fetchAll();
    }

    static function SEARCH($key, $value, $table)
    {
        $sqlText = 'SELECT * FROM '.$table.' WHERE '.$key.' LIKE "%'.$value.'%"';
        $statement = Database::$PDO->prepare($sqlText);
        $statement->execute();
        return $statement->fetchAll();
    }

    static function FIND($key, $value, $table)
    {
        $sqlText = 'SELECT * FROM '.$table.' WHERE '.$key.' = "'.$value.'"';
        $statement = Database::$PDO->prepare($sqlText);
        $statement->execute();
        return $statement->fetch();
    }    

    static function INSERT($data, $tableName)
    {
        $dbCONNECTION = Database::$PDO;

        if(sizeof($data) <= 0 )return false;

        // STATEMENT:    INSERT INTO tabelle (spalte1, spalte2, splate3) VALUES (?, ?, ?)
        $stringSTMT1 = "INSERT INTO ".$tableName." (";
        $stringSTMT2 = ") VALUES (";
        $stringSTMT3 = ")";

        foreach($data as $key => $value){
            $stringSTMT1 = $stringSTMT1.$key.'';
            $stringSTMT2 = $stringSTMT2.':'.$key;

            if(array_search($key, array_keys($data))+1 < sizeof($data)){
                $stringSTMT1 = $stringSTMT1.', ';
                $stringSTMT2 = $stringSTMT2.', '; 
            }
        }

        $stringStatement = $stringSTMT1.$stringSTMT2.$stringSTMT3;

        $statement = $dbCONNECTION->prepare($stringStatement);

        if(!$statement){
            throw new \Exception("Statement was unsuccessful! With query: ".$stringStatement);
        }else{
            $numberOfEditedValues = $statement->execute($data);  
            if($numberOfEditedValues == 0){
                throw new \Exception("Could not add database entry! With query: ".$stringStatement);
            }
        }

        return $dbCONNECTION->lastInsertId();
    }

    static function DELETE($id, $tableName)
    {
        $statement = Database::$PDO->prepare('DELETE FROM '.$tableName.' WHERE id = '.$id);
        $statement->execute();
    }
    
    static function DELETE_WHERE($whereClause, $tableName)
    {
        $statement = Database::$PDO->prepare('DELETE FROM '.$tableName.' WHERE '.$whereClause);
        $statement->execute();
    }
    
}

Database::$PDO = new PDO('mysql:host=' . Database::$DB_HOST . ';dbname='.Database::$DB_NAME, Database::$DB_USER, Database::$DB_PASSWORD);