<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterLongKeywordsStartingWithVowel extends WordsFilter
{
  public function __invoke($words, $keywords)
  {
    $output = $this->filterKeywords($words, $keywords);
    $output = $this->filterVowelStartingWords($output);
    return $this->filterMoreThanTwoCharacters($output);
  }
}
