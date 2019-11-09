<?php

class Cart {
  /* Member variables */
  /* make them private for encapsulation */
  
  //these will be stored in session
  private $id;
  private $qty; //quantity

  //for cartList only
  private $product;

  /* constructor */
  function __construct($id, $qty, $product=null){
    $this->id = $id;
    $this->setQty($qty);
  $this->product = $product; 
  }

  //only private variables were set
  function __set($variable, $value){
    if ($variable == "qty") {
      $this->setQty($value);
    } else {
      $this->$variable = $value;
    }
  }
   
  function __get($variable){
    return $this->$variable;
  }

  function setQty($value){
    if ($value < 1 ) {
      $this->qty = 1;
    } else {
        $this->qty = $value;
    }

  }
}

?>