<?php

namespace ORM;

class Word{

    public $id;
    public $word = "";
    
    function __construct($id, $word = ""){
        $this->id = $id;
        $this->word = $word;
    }

    function load()
    {
        $data = Database::SELECT('SELECT * FROM words WHERE id = '.$this->id);
        if(isset($data)){
            $this->word = $data[0]['word'];
        }else{ 
            throw "Retriving was not successful!";
        }
    }

    function links(){
        $data = Database::SELECT('SELECT * FROM word_links WHERE word_id = '.$this->id);
        $linkArray = [];
        foreach($data as $tupel){
            $link = new Link($tupel['link_id']);
            $link->load();
            $linkArray[] = $link;
        }
        return $linkArray;
    }

    function delete(){
        Database::DELETE_WHERE('word_id = '.$this->id, 'word_links');
        Database::DELETE($this->id, 'words');
    }

    //////////////////STATIC/////////////////////////////
    static function all()
    {
        $data = Database::SELECT('SELECT * FROM words');
        $wordArray = [];
        foreach($data as $tupel){
            $wordArray[] = new Word($tupel['id'], $tupel['word']);
        }
        return $wordArray;
    }

    static function create($data)
    {
        $id = Database::INSERT($data, 'words');
        $wordObject = new Word($id);
        $wordObject->load();
        return $wordObject;
    }
}