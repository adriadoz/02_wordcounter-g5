<?php

namespace MPWAR5\Wordcounter;

final class Counter
{
    public function __invoke(String $text): void
    {
        echo "Total Words: " . count(explode(" ", $text));
    }
}