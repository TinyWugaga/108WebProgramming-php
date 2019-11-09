<?php
class Stickers {
  /* Member variables */
  /* make them private for encapsulation */
   
  private $id;
  private $title;
  private $author;
  private $description; 
  private $price;
  private $created_at;


  //only private variables were set
  function __set($variable, $value){}
    
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */
  function __construct(){
  //__set is called before __construt
  //this should be modified to prevent PDO reset variables
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