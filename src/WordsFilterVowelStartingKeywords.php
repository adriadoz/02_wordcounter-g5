<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterVowelStartingKeywords extends WordsFilter
{
  public function __invoke($words, $keywords)
  {
    $output = $this->filterVowelStartingWords($words);
    return $this->filterKeywords($output, $keywords);
  }
}
