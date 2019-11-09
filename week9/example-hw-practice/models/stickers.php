<?php
class Stickers {
   
  private $id;
  private $title;
  private $author;
  private $description; 
  private $price;
  private $created_at;


  function __set($variable, $value){}
    
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */
  function __construct(){

    $arguments = func_get_args();
    if (sizeof(func_get_args()) == 6){
      $this->id = $arguments["id"];
      $this->title = $arguments["title"];
      $this->author = $arguments["author"];
      $this->description = $arguments["description"];
      $this->price = $arguments["price"];
      $this->created_at = $arguments["created_at"];
    }
  }
  
}
?>