<?php
require 'product.php';
class ProductData{
  /* Member variables */
  /* make them private for encapsulation */
  private $products;

  /* constructor */
  function __construct(){
    $this->products= array(
      new Product("0","iPhone 11",24900),
      new Product("1","iPhone 11 Pro",35900),
      new Product("2","iPhone 11 Pro Max",39900),
      new Product("3","iPhone XR",21500),
      new Product("4","iPhone 8",15900),
      new Product("5","iPhone 8 Plus",19900)
    );
  }

  function listAllProducts(){
    return $this->products;
  }
 
  function retrieveProduct($id){
    return $this->products[$id];
  }

}
?>