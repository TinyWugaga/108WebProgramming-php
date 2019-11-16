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
      return;
    }
    if($variable == "wish_list")
    {
      $this->setWishList($value);
      return;
    }
    $this->$variable = $value;
  }
  
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */

  function __construct(){

    $arguments = func_get_args();
    if (sizeof(func_get_args()) == 9){
        
      $this->id         = $arguments["id"];
      $this->role       = setRole($arguments["role"]);
      $this->account    = $arguments["account"];
      $this->password   = $arguments["password"];
      $this->name       = $arguments["name"];
      $this->wish_list  = setWishList($arguments["wish_list"]);
      $this->created_at = $arguments["created_at"];
      $this->updated_at = $arguments["updated_at"];
      $this->deleted_at = $arguments["deleted_at"];
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

  //將願望清單轉換成json格式
  function setWishList($wishList) {
    $this->wish_list = json_decode($wishList,JSON_UNESCAPED_UNICODE);
  }
   
}

?>