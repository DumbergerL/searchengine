<?php
// Melde alle PHP Fehler (siehe Changelog)
error_reporting(E_ALL);

use ORM\Link;
use ORM\Word;
use SearchEngine\AutoCrawler;
use SearchEngine\Crawler;

require_once './src/autoload.php';

echo "<h1> HELLO WORLD!</h1>";

//Crawler::CRAWL('');
AutoCrawler::start("https://www.heidenheim.dhbw.de/startseite.html");