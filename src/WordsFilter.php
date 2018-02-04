<?php

namespace MPWAR5\Wordcounter;

final class WordsFilter
{

  public static function filter($words, $options): array
  {
    $output = $words;
    if(array_key_exists('keywords', $options)) {
      $output = self::filterKeywords($words, $options['keywords']);
    }
    if(array_key_exists('vowelStarting', $options)) {
      $output = self::filterVowelStartingWords($output);
    }
    if(array_key_exists('moreThanTwoChars', $options)) {
      $output = self::filterMoreThanTwoCharacters($output);
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
