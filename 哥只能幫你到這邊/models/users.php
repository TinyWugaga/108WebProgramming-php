<?php
class Users {
  /* Member variables */
  /* make them private for encapsulation */
   
  private $id;
  private $account;
  private $password;
  private $name;
  private $created_at;

  //https://phpdelusions.net/pdo/fetch_modes#FETCH_CLASS
  //only private variables were set
  function __set($variable, $value){}
  
  //https://culttt.com/2014/04/16/php-magic-methods/
  //https://www.tutorialdocs.com/article/16-php-magic-methods.html
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */

  function __construct(){
  //__set is called before __construt
  //this should be modified to prevent PDO reset variables
    $arguments = func_get_args();
    if (sizeof(func_get_args()) == 5){
        
      $this->id = $arguments["id"];
      $this->account = $arguments["account"];
      $this->password = $arguments["password"];
      $this->name = $arguments["name"];
      $this->created_at = $arguments["created_at"];
    }

  }
   
}

?>