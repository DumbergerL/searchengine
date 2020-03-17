<?php

namespace SearchEngine;

class AutoCrawler{

    static $CRAWL_LIMIT = 4;

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
                echo '<li>Crawl... '.$crawlUrl.'</li>';
                $returnObject = Crawler::CRAWL($crawlUrl);
                $crawledPages++;
                if($crawledPages >= AutoCrawler::$CRAWL_LIMIT) break;
                $newUrlArray = array_merge($newUrlArray, $returnObject['urls']);
            }

            if($crawledPages >= AutoCrawler::$CRAWL_LIMIT) break;
            $urlArray = $newUrlArray;
            $i++;
        }
    }
}