<?php

class Customer {
  /* Member variables */
  /* make them private for encapsulation */
  private $name;
  private $city;
  private $rank;

  /* constructor */
  function __construct($name, $city, $rank){
    $this->name = $name;
    $this->city = $city;
    $this->rank = $rank;
    //$this->setRank($rank);
  }

  //only private variables were set
  function __set($variable, $value){
    /*
    if ($variable == "rank") {
      $this->setRank($value);
    } else {
      $this->$variable = $value;
    }
    */
  }
   
  function __get($variable){
    return $this->$variable;
  }

  function setRank($value){
    if ($value < 0 ) {
      $this->rank = 0;
    } else {
        $this->rank = $value;
    }

  }

}

?>