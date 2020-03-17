<?php
// Melde alle PHP Fehler (siehe Changelog)
error_reporting(E_ALL);

use ORM\Link;
use ORM\Word;

require_once './src/autoload.php';

echo "<h1> HELLO WORLD!</h1>";

$word = new Word(6);
$word->load();

$word->delete();

