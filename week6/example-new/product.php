<?php

class Product {
  /* Member variables */
  /* make them private for encapsulation */
  
  private $id;
  private $name;
  private $price;

  /* constructor */
  function __construct($id, $name, $price){
    $this->id = $id;
    $this->name = $name;
    $this->setPrice($price);
  }

  //only private variables were set
  function __set($variable, $value){
    if ($variable == "price") {
      $this->setPrice($value);
    } else {
      $this->$variable = $value;
    }
  }
   
  function __get($variable){
    return $this->$variable;
  }

  function setPrice($value){
    if ($value < 0 ) {
      $this->price = 0;
    } else {
        $this->price = $value;
    }
  }
}

?>