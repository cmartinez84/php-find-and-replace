<?php
  class findAndReplace
  {
    public $wordBankArray;
    public $storedSentence;
    public $previous;

    function __construct(){
      $this-> wordBankArray = explode(" ", "Beware the Jabberwock my son The jaws that bite the claws that catch Beware the Jubjub bird and shun The frumious Bandersnatch He took his vorpal sword in hand Long time the manxome foe he sought So rested he by the Tumtum tree And stood awhile in thought and as in uffish thought he stood The Jabberwock with eyes of flame Came whiffling through the tulgey wood And burbled as it came One two One two And through and through The vorpal blade went snicker-snack He left it dead and with its head He went galumphing back And has thou slain the Jabberwock Come to my arms my beamish boy frabjous day Callooh Callay He chortled in his joy");
    }

    function playFindAndReplace($input_search_string, $input_replacement, $input_sentence)
    {
      $this->storedSentence = $this->upperCase(str_ireplace($input_search_string, $input_replacement, $input_sentence));
    }

    function findAndReplaceRandom($input_sentence, $input_replacement)
    {
      $input_array = explode(" ", $input_sentence);
      $find = mt_rand(0, count($input_array) -1);
      array_splice($input_array, $find, 1, $input_replacement);
      $this->storedSentence = $this->upperCase(implode(" ", $input_array));
      $_SESSION['previous'] = $this->storedSentence;
    }
    function madlib ($input_sentence){
      $this->previous = $_SESSION['previous'];
      $find = mt_rand(0, count($this->wordBankArray) -1);
      $randomReplacement =  $this->wordBankArray[$find];
      $this->findAndReplaceRandom($input_sentence, $randomReplacement);

    }
    function save(){
      $_SESSION['madlib'] = $this;
    }
    function upperCase($input){
      $input_array = str_split($input);
      foreach ($input_array as $index => $char) {
        if(($char =="." || $char == "!" ||$char == "?") && ($index < (count($input_array)-3))){
          $input_array[$index +2 ] = ucfirst($input_array[$index + 2]);
        }
      }
      $result= ucfirst(implode($input_array));
      return $result;
    }
  }
 ?>
