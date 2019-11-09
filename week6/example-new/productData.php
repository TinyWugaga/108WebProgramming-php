<?php
require 'product.php';

class ProductData {
  /* Member variables */
  /* make them private for encapsulation */
  private $products;
  private $productsTitle;

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
    $this->productsTitle = [
      "id"=>["name"=>"產品編號", "sort"=>false],
      "name"=>["name"=>"產品姓名", "sort"=>true],
      "price"=>["name"=>"產品價格", "sort"=>true],
    ];
  }

  function listAllProducts(){
    return $this->products;
  }

  function listProductsTitle(){
    return $this->productsTitle;
  }
 
  function retrieveProduct($id){
    return $this->products[$id];
  }
}

function comparator($object1, $object2)
{
  global $sort;
  if($sort)
  {
    return $object1->$sort > $object2->$sort;
  }
  else{
    return $object1->id > $object2->id;
  }
}
?>