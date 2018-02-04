<?php

namespace MPWAR5\Wordcounter;

final class WordsFilterKeywords extends WordsFilter
{
  public function __invoke($words, $keywords)
  {
    return $this->filterKeywords($words, $keywords);
  }
}
