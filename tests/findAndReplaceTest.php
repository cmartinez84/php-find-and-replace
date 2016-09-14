<?php

    require_once "src/findAndReplace.php";

    class findAndReplaceTest extends PHPUnit_Framework_TestCase
    {

        function test_playFindAndReplace(){
          $test_playFindAndReplace = new findAndReplace;
          $input_search_string = "orld";
          $input_replacement = "p";
          $input_sentence = "Hello World";

          //Act
          $result = $test_playFindAndReplace->playFindAndReplace($input_search_string, $input_replacement, $input_sentence);

          //Assert
          $this->assertEquals("Hello Wp", $result);
        }
        function test_upperCase(){
          $test_upperCase = new findAndReplace;
          $input_sentence = "hello. f.";

          //Act
          $result = $test_upperCase->upperCase($input_sentence);

          //Assert
          $this->assertEquals("Hello. F.", $result);
        }
    }
?>
