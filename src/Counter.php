<?php

namespace MPWAR5\Wordcounter;

final class Counter
{
    public function __construct ($text, $keywords)
    {
      $this->words = array_map('strtolower', explode(" ", $text));
      $this->keywords = array_map('strtolower', explode(" ", $keywords));
      $this->words = array_map(array($this, "deleteInvalidChars"), $this->words);
      $this->keywords = array_map(array($this, "deleteInvalidChars"), $this->keywords);
    }

    public function __invoke(): void
    {
        Printer::printText("Total Words: " . $this->countTotalWords() . "\n");
        Printer::printText("Words that start with vowel: " . $this->countVowelStartingWords() . "\n");
        Printer::printText("Words that have more than two characters: " . $this->countMoreThanTowCharsWords() . "\n");
        Printer::printText("Keywords: " . $this->countKeywordsOcurrencies() . "\n");
    }

    private function countTotalWords ()
    {
      return count($this->words);
    }

    private function countVowelStartingWords ()
    {
      return count(array_filter(array_map(array($this, "wordStartsWithVowel"), $this->words)));
    }

    private function countMoreThanTowCharsWords ()
    {
      return count(array_filter(array_map(array($this, "moreThanTwoChars"), $this->words)));
    }

    private function countKeywordsOcurrencies ()
    {
      return count(array_intersect($this->words, $this->keywords));
    }

    private function deleteInvalidChars ($word)
    {
      return str_replace(array('.',',', '/', '\\', '-', '_'), '', $word);
    }

    private function wordStartsWithVowel ($word)
    {
      if(preg_match('/^[aeiou]/i', $word)) {
        return $word;
      }
    }

    private function moreThanTwoChars ($word)
    {
      if(strlen($word) > 2) {
        return $word;
      }
    }
}
