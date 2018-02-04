<?php

namespace MPWAR5\Wordcounter;

class WordsFilter
{

  public function filterVowelStartingWords($words): array
  {
    return array_filter(array_map(array('self', "wordStartsWithVowel"), $words));
  }

  public function filterKeywords($words, $keywords): array
  {
    return array_intersect($words, $keywords);
  }

  public function filterMoreThanTwoCharacters($words): array
  {
    return array_filter(array_map(array('self', "moreThanTwoChars"), $words));
  }

  private function moreThanTwoChars ($word)
  {
    if(strlen($word) > 2) {
      return $word;
    }
  }

  private function wordStartsWithVowel ($word)
  {
    if(preg_match('/^[aeiou]/i', $word)) {
      return $word;
    }
  }

}
