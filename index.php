<?php
// Melde alle PHP Fehler (siehe Changelog)
error_reporting(E_ALL);

use ORM\Link;
use ORM\Word;
use SearchEngine\AutoCrawler;
use SearchEngine\Crawler;
use SearchEngine\Search;

require_once './src/autoload.php';


//Crawler::CRAWL('');
//AutoCrawler::start("https://www.dumbergerl.com/");
/*
$links = Search::query('DHBW Lukas');

foreach($links as $link)
{
    echo "<br><li>".$link->link."</li>";
}*/

?>
<html>
    <head>
        <title>Search Engine</title>
        <style>
            div{
                border: 1px solid black;
                margin: 10px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Search Engine</h1>

        <div>
            <h3>Index Page</h3>
            <form method="post">
                <input type="text" name="addPage">
                <input type="submit" name="Indexieren...">
            </form>
            <?php
                if(isset($_POST['addPage'])){
                    AutoCrawler::start($_POST['addPage']);
                }
            ?>
        </div>

        <div>
            <h3>Searchbar</h3>
            <form method="post">
                <input type="text" name="searchQuery" value="<?php echo ( isset($_POST['searchQuery']) ? $_POST['searchQuery'] :  '' ); ?>">
                <input type="submit" name="Suchen...">
            </form>
            <?php
                if(isset($_POST['searchQuery'])){
                    $links = Search::query( $_POST['searchQuery'] );

                    foreach($links as $link)
                    {
                        echo '<li><a href="'.$link->link.'">'.$link->link.'</a></li>';
                    }
                }
            ?>
        </div>
        
    </body>
</html>



