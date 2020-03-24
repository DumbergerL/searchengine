<?php
/**
 * Created by PhpStorm.
 * User: Patrick Kratzer
 * Date: 19.03.2020
 * Time: 11:26
 */

use SearchEngine\AutoCrawler;

/**
 * require files for text parts
 */
require __DIR__ . '/content/main.php';
require __DIR__ . '/content/search.php';
require __DIR__ . '/content/results.php';

require __DIR__ . '/../src/autoload.php';

/**
 * write header
 */
echo getHeader("QUERII");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

switch ($page) {
    case 'result':
        /**
         * print result
         */
        echo getResultsHtml($_GET['query']);
        break;
    case 'add':
        /**
         * add URL if necessary
         */
        if(isset($_POST['limit'])){
            AutoCrawler::$CRAWL_LIMIT = $_POST['limit'];
        }
        if (isset($_POST['url'])) {
            AutoCrawler::start($_POST['url']);
        }
        echo getSearchAddSiteContent();
        break;
    default:
        /**
         * write search and add site content
         */
        echo getSearchAddSiteContent();
}

/**
 * write footer
 */
echo getFooter();