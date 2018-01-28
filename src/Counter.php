<?php

namespace MPWAR5\Wordcounter;

final class Counter
{

    public function __construct ($text, $keywords)
    {
      $this->words = explode(" ", $text);
      $this->keywords = $keywords;
    }

    public function __invoke(): void
    {
        echo "Total Words: " . $this->countTotalWords() . "\n";
        echo "Words that start with vowel: " . $this->countVowelStartingWords() . "\n";
    }

    private function countTotalWords ()
    {
      return count($this->words);
    }

    private function countVowelStartingWords ()
    {
      return count(array_filter(array_map(array($this, "wordStartsWithVowel"), $this->words)));
    }

    private function wordStartsWithVowel ($word)
    {
      if(preg_match('/^[aeiou]/i', $word)) {
        return $word;
      }
    }
}
