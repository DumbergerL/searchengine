<?php

namespace ORM;

class Word{

    public $id;
    public $word = "";
    
    function __construct($id){
        $this->id = $id;
        // retrive Data from Database
    }

    static function all()
    {
        // retrive all Tupels and return array of Link Objects
    }
}