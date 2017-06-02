<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Hikaeme\StdinIterator;

$stdin = new StdinIterator();

foreach ($stdin as $line) {
    echo $line;
}
