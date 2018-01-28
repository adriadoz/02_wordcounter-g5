<?php

require_once 'vendor/autoload.php';

use MPWAR5\Wordcounter\Counter;

$text = 'Esto es un texto molón que sirve como juego de pruebas para
la kata de contar palabrejas. No me hagas un diseño de gañán
ni de hiper-arquitecto. Que te veo, eh.';
$keywords = array('palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh');

$counter = new Counter($text, $keywords);
$counter();
