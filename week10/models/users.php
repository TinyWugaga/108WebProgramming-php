<?php
class Users {
   
  private $id;
  private $account;
  private $password;
  private $name;
  private $created_at;

  function __set($variable, $value){
    if ($variable == "role")
    {
      $this->setRole($value);
    }
    else
    {
      $this->$variable = $value;
    }
  }
  
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */

  function __construct(){

    $arguments = func_get_args();
    if (sizeof(func_get_args()) == 6){
        
      $this->id = $arguments["id"];
      $this->role = setRole($arguments["role"]);
      $this->account = $arguments["account"];
      $this->password = $arguments["password"];
      $this->name = $arguments["name"];
      $this->created_at = $arguments["created_at"];
    }
  }

  //將身份代碼轉換為文字
  function setRole($role) {
    if($role == 'M')
    {
      $this->role = '管理者';
    }
    else
    {
      $this->role =  '顧客';
    }
  }
   
}

?>