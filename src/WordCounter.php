<?php

namespace MPWAR5\Wordcounter;

final class WordCounter
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
      Printer::printText("Total Words: " . count($this->words) . "\n");
      Printer::printText("Words that start with vowel: " . count($this->getVowelStartingWords()) . "\n");
      Printer::printText("Words that have more than two characters: " . count($this->getMoreThanTowCharsWords()) . "\n");
      Printer::printText("Keywords: " . count($this->getKeywordsOcurrencies()) . "\n");
    }

    private function getVowelStartingWords ()
    {
      return WordsFilter::filter($this->words, array('vowelStarting' => true));
    }

    private function getMoreThanTowCharsWords ()
    {
      return WordsFilter::filter($this->words, array('moreThanTwoChars' => true));
    }

    private function getKeywordsOcurrencies ()
    {
      return count(WordsFilter::filter($this->words, array('keywords' => $this->keywords)));
    }

    private function deleteInvalidChars ($word)
    {
      return str_replace(array('.',',', '/', '\\', '-', '_'), '', $word);
    }

}
