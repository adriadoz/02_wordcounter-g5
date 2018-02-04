<?php

namespace MPWAR5\Wordcounter;

final class WordsFilter {


  public static function filter($words, $options): array
  {
    $output = [];
    if(array_key_exists('keywords', $options)) {
      $output = array_merge($output, self::filterKeywords($words, $options['keywords']));
    }
    if(array_key_exists('vowelStarting', $options)) {
      $output = array_merge($output, self::filterVowelStartingWords($words));
    }
    if(array_key_exists('moreThanTwoChars', $options)) {
      $output = array_merge($output, self::filterMoreThanTwoCharacters($words));
    }
    return $output;
  }

  private function filterVowelStartingWords($original): array
  {
    return array_filter(array_map(array('self', "wordStartsWithVowel"), $original));
  }

  private function wordStartsWithVowel ($word)
  {
    if(preg_match('/^[aeiou]/i', $word)) {
      return $word;
    }
  }

  private function filterKeywords($original, $keywords): array
  {
    return array_intersect($original, $keywords);
  }

  private function filterMoreThanTwoCharacters($original): array
  {
    return array_filter(array_map(array('self', "moreThanTwoChars"), $original));
  }

  private function moreThanTwoChars ($word)
  {
    if(strlen($word) > 2) {
      return $word;
    }
  }

}
