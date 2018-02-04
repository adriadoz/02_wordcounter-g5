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
      Printer::plainText("Total Words: " . count($this->words) . "\n");
      Printer::plainText("Words that start with vowel: " . count($this->getVowelStartingWords()) . "\n");
      Printer::plainText("Words that have more than two characters: " . count($this->getMoreThanTowCharsWords()) . "\n");
      Printer::plainText("Keywords: " . count($this->getKeywordsOcurrencies()) . "\n");
      Printer::plainText("Words that have more than two characters and start with vowel: " . count($this->getLongVowelSatartingWords()) . "\n");
      Printer::plainText("Keywords that start with vowel: " . count($this->getKeywordVowelSatartingWords()) . "\n");
      Printer::plainText("More than two character keywords that start with vowel: " . count($this->getLongKeywordsStartingWithVowel()) . "\n");
    }

    private function getVowelStartingWords (): array
    {
      $filter = new WordsFilterStartsWithVowel();
      return $filter($this->words);
    }

    private function getMoreThanTowCharsWords (): array
    {
      $filter = new WordsFilterMoreThanTwoCharacters();
      return $filter($this->words);
    }

    private function getKeywordsOcurrencies (): array
    {
      $filter = new WordsFilterKeywords();
      return $filter($this->words, $this->keywords);
    }

    private function getLongVowelSatartingWords (): array
    {
      $filter = new WordsFilterLongVowelStarting();
      return $filter($this->words);
    }

    private function getKeywordVowelSatartingWords (): array
    {
      $filter = new WordsFilterVowelStartingKeywords();
      return $filter($this->words, $this->keywords);
    }

    public function getLongKeywordsStartingWithVowel (): array
    {
      $filter = new WordsFilterLongKeywordsStartingWithVowel();
      return $filter($this->words, $this->keywords);
    }

}
