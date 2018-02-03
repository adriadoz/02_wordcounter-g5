<?php

namespace MPWAR5\Wordcounter;

class WordsFilter {

  public static function byKeyWords($original, $filter)
  {
    return array_intersect($original, $filter);
  }

}
