<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterMoreThanTwoCharacters extends WordsFilter
{
  public function __invoke($words)
  {
    return $this->filterMoreThanTwoCharacters($words);
  }
}
