<?php

namespace SearchEngine;

use ORM\Link;
use ORM\Word;

class Search{

    static function query($query)
    {
        $words = explode(' ', $query);
        $links = [];
        foreach($words as $word)
        {
            $links = array_merge($links, Search::string($word));
        }
        return Link::uniqueArray($links);
    }

    static function string($string)
    {
        $linkArray = [];
        $wordArray = Word::search('word', strtolower($string) );

        foreach($wordArray as $word)
        {
            $linkArray = array_merge($linkArray, $word->links());
        }
        return Link::uniqueArray( $linkArray );
    }
}