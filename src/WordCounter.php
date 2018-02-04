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

    private function getLongVowelSatartingWords (): array
    {
      return WordsFilter::filter($this->words, array('vowelStarting' => true, 'moreThanTwoChars' => true));
    }

    private function getKeywordVowelSatartingWords (): array
    {
      return WordsFilter::filter($this->words, array('vowelStarting' => true, 'keywords' => $this->keywords));
    }

    public function getLongKeywordsStartingWithVowel (): array
    {
      return WordsFilter::filter($this->words, array('vowelStarting' => true, 'keywords' => $this->keywords, 'moreThanTwoChars' => true));
    }

}
