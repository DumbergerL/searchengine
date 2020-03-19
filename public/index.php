<?php
/**
 * Created by PhpStorm.
 * User: Patrick Kratzer
 * Date: 19.03.2020
 * Time: 11:26
 */

/**
 * require files for text parts
 */
require __DIR__ . '/content/main.php';
require __DIR__ . '/content/search.php';

/**
 * write header
 */
echo getHeader("QUERII");

switch ($_GET['page']) {
    case 'result':
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