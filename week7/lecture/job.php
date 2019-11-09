<?php
class Job {
  /* Member variables */
  /* make them private for encapsulation */
   
  private $postid;
  private $company;
  private $content;
  private $pdate;

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
    if (sizeof(func_get_args())==4){
      $this->postid = $arguments["postid"];
      $this->company = $arguments["company"];
      $this->content = $arguments["content"];
      $this->pdate = $arguments["pdate"];
    }


  }
   
}
?>