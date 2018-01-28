<?php

namespace MPWAR5\Wordcounter;

final class Counter
{

    public function __construct ($text, $keywords)
    {
      $this->text = $text;
      $this->keywords = $keywords;
    }

    public function __invoke(): void
    {
        echo "Total Words: " . $this->countTotalWords() . "\n";
    }


    private function countTotalWords ()
    {
      return count(explode(" ", $this->text));
    }
}
