<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

echo "Total Words: " . count(explode(" ", $argv[1]));

?>
