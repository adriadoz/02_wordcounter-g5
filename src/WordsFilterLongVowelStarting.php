<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterLongVowelStarting extends WordsFilter
{
  public function __invoke($words)
  {
    $output = $this->filterMoreThanTwoCharacters($words);
    return $this->filterVowelStartingWords($output);
  }
}
