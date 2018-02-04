<?php

namespace MPWAR5\Wordcounter;

final class WordsFormatter {

  const INVALID_CHARS = array('.',',', '/', '\\', '-', '_');

  public static function format ($words): array
  {
    $output = array_filter(array_map(array('self', "deleteInvalidChars"), $words));
    $output = array_filter(array_map("strtolower", $output));
    return $output;
  }

  private function deleteInvalidChars ($word): string
  {
    return str_replace(self::INVALID_CHARS, '', $word);
  }
}
