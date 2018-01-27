<?php

require_once 'vendor/autoload.php';

use MPWAR5\Wordcounter\Counter;

$counter = new Counter;
$counter($argv[1]);