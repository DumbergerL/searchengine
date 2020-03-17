<?php

namespace ORM;

class Link{

    public $id;
    public $link = "";
    public $updated_at = "";

    function __construct($id, $link = "", $updated_at=""){
        $this->id = $id;
        $this->link = $link;
        $this->updated_at = $updated_at;
    }

    function load()
    {
        $data = Database::SELECT('SELECT * FROM links WHERE id = '.$this->id);
        if(isset($data)){
            $this->link = $data[0]['link'];
            $this->updated_at = $data[0]['updated_at'];
        }else{ 
            throw "Retriving was not successful!";
        }
    }

    function words(){
        $data = Database::SELECT('SELECT * FROM word_links WHERE link_id = '.$this->id);
        $wordArray = [];
        foreach($data as $tupel){
            $word = new Word($tupel['word_id']);
            $word->load();
            $wordArray[] = $word;
        }
        return $wordArray;
    }

    function delete(){
        Database::DELETE_WHERE('link_id = '.$this->id, 'word_links');
        Database::DELETE($this->id, 'links');
    }

    //////////////////STATIC/////////////////////////////
    static function all()
    {
        $data = Database::SELECT('SELECT * FROM links');
        $linkArray = [];
        foreach($data as $tupel){
            $linkArray[] = new Link($tupel['id'], $tupel['link'], $tupel['updated_at']);
        }
        return $linkArray;
    }

    static function create($data)
    {
        $id = Database::INSERT($data, 'links');
        $linkObject = new Link($id);
        $linkObject->load();
        return $linkObject;
    }
}