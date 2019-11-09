<?php
class Job {
   
  private $postid;
  private $company;
  private $content;
  private $pdate;


  function __set($variable, $value){}
  
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */
  
  function __construct(){

    $arguments = func_get_args();

    // 接收參數為$_POST，即 $arguments = [postid,company,content,pdate]
    if (sizeof(func_get_args())==4){
      $this->postid = $arguments["postid"];
      $this->company = $arguments["company"];
      $this->content = $arguments["content"];
      $this->pdate = $arguments["pdate"];
    }

   // 接收參數為$_POST，即 $arguments = [$_POST]
    if (sizeof(func_get_args())==1){

      $this->postid = isset($arguments[0]["postid"])? $arguments[0]["postid"] : 0;

      $this->company = $arguments[0]["company"];
      $this->content = $arguments[0]["content"];
      $this->pdate = $arguments[0]["pdate"];
    }

  }
 
  /*將物件轉換成陣列*/
 function toArrayInsert(){
  //this will return all variables without postid
  return array( 
   "company"=>$this->company, 
   "content"=>$this->content, 
   "pdate"=>$this->pdate);
 }
 
 function toArray(){
  //this will return all variables includes postid
  return get_object_vars($this);
 }
  
   
}
?>