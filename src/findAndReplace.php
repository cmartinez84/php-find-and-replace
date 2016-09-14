<<?php
  class findAndReplace
  {
    function playFindAndReplace($input_search_string, $input_replacement, $input_sentence){
      return str_ireplace($input_search_string, $input_replacement, $input_sentence);
    }
  }
 ?>
