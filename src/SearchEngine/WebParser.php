<?php
namespace SearchEngine;

use Soundasleep\Html2Text;

class WebParser{

    static function URLS($html)
    {
        $NEW_URLS = [];

        $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
        if(preg_match_all("/$regexp/siU", $html, $matches, PREG_SET_ORDER)) {
            foreach($matches as $match) {
                $foundUrl = $match[2];
                if(strpos($foundUrl,'http') !== false){     //only accept links with http
                    $NEW_URLS[] = $match[2];
                }
            }
        }

        return $NEW_URLS;
    } 

    static function WORDS($html)
    {
        $options =  array(
            'ignore_errors' => true,
            'drop_links' => true,
        );
        $text = Html2Text::convert($html, $options);
        $wordArray = [];
        preg_match_all('/[a-zA-Z]+\s/', $text, $wordArray);

        $wordArray = array_map(function($element){ return strtolower($element); }, $wordArray[0]);

        return $wordArray;
    }
}