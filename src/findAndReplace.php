<?php
  class findAndReplace
  {
    function playFindAndReplace($input_search_string, $input_replacement, $input_sentence)
    {
      return str_ireplace($input_search_string, $input_replacement, $input_sentence);
    }

    function findAndReplaceRandom($input_sentence, $input_replacement)
    {
      $input_array = explode(" ", $input_sentence);
      $find = mt_rand(0, count($input_array) -1);
      array_splice($input_array, $find, 1, $input_replacement);
      $input = implode(" ", $input_array);
      return $input;
    }
  }
 ?>
