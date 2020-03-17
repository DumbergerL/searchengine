<?php

namespace ORM;

class Link{

    public $id;
    public $link = "";
    public $updated_at = "";

    function __construct($id){
        $this->id = $id;
        // retrive Data from Database
    }

    static function all()
    {
        // retrive all Tupels and return array of Link Objects
    }
}