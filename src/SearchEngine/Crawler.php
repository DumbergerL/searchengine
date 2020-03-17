<?php

namespace SearchEngine;

use ORM\Link;

class Crawler{

    static public function CRAWL($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $result = curl_exec($ch);
        curl_close($ch);
    
        $wordArray = WebParser::WORDS($result);
        
        $linkObject = Link::find($url);
        if($linkObject === null){
            $linkObject = Link::create([
                'link' => $url
            ]);
        }

        foreach($wordArray as $word)
        {
            $linkObject->addWord($word);
        }

        return [
            'words' => $wordArray,
            'urls' => WebParser::URLS($result),
            'current_link' => $linkObject 
        ];
    }
}