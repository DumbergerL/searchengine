<?php

use ORM\Link;
use SearchEngine\Crawler;

require_once 'autoload.php';


$allLinks = Link::all();

foreach($allLinks as $linkObject)
{
    $linkObject->delete();
    Crawler::CRAWL( $linkObject->link ); 
}