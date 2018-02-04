<?php

namespace MPWAR5\Wordcounter;

final class WordCounter
{
    public function __construct ($text, $keywords)
    {
      $this->words = WordsFormatter::format(explode(" ", $text));
      $this->keywords = WordsFormatter::format(explode(" ", $keywords));
    }

    public function __invoke(): void
    {
      Printer::printText("Total Words: " . count($this->words) . "\n");
      Printer::printText("Words that start with vowel: " . count($this->getVowelStartingWords()) . "\n");
      Printer::printText("Words that have more than two characters: " . count($this->getMoreThanTowCharsWords()) . "\n");
      Printer::printText("Keywords: " . count($this->getKeywordsOcurrencies()) . "\n");
    }

    private function getVowelStartingWords (): array
    {
      return WordsFilter::filter($this->words, array('vowelStarting' => true));
    }

    private function getMoreThanTowCharsWords (): array
    {
      return WordsFilter::filter($this->words, array('moreThanTwoChars' => true));
    }

    private function getKeywordsOcurrencies (): array
    {
      return WordsFilter::filter($this->words, array('keywords' => $this->keywords));
    }

}
