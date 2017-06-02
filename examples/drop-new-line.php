<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Hikaeme\StdinIterator;

$stdin = new StdinIterator(StdinIterator::DROP_NEW_LINE);

foreach ($stdin as $line) {
    echo $line;
}

echo PHP_EOL;
