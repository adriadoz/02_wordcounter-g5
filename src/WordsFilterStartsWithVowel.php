<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterStartsWithVowel extends WordsFilter
{
  public function __invoke($words)
  {
    return $this->filterVowelStartingWords($words);
  }
}
