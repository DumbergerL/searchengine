<?php

namespace SearchEngine;

class AutoCrawler{

    static $CRAWL_LIMIT = 3;

    static function start($url)
    {
        $urlArray = [$url];

        $i = 0;
        $crawledPages = 0;

        while($crawledPages < AutoCrawler::$CRAWL_LIMIT)
        {
            $newUrlArray = [];
            foreach($urlArray as $crawlUrl)
            {
                echo '<br><li>Crawl... '.$crawlUrl.'</li>';
                $returnObject = Crawler::CRAWL($crawlUrl);
                $crawledPages++;
                $newUrlArray = array_merge($newUrlArray, $returnObject['urls']);
            }

            $urlArray = $newUrlArray;
            $i++;
        }
    }
}