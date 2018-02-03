<?php

namespace MPWAR5\Wordcounter;

require_once 'vendor/autoload.php';

$text = 'Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.';
$keywords = 'palabrejas gañán hiper-arquitecto que eh';

$counter = new WordCounter($text, $keywords);
$counter();
