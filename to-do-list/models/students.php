<?php
class Students {
   
  private $id;
  private $student_id;
  private $name;
  private $gender;
  private $created_at;
  private $updated_at;
  private $deleted_at;

  function __set($variable, $value){
    if ($variable == "gender")
    {
      $this->setGender($value);
    }
    
    $this->$variable = $value;
  }
  
  function __get($variable){  
    return $this->$variable;
  }

  /* constructor */

  function __construct(){

    $arguments = func_get_args();

    if (sizeof(func_get_args()) == 1){
        
      $data = $arguments[0];

      $this->id         = $data["id"];
      $this->student_id = $data["student_id"];
      $this->name       = $data["name"];
      $this->setGender($data["gender"]);
      $this->created_at = $data["created_at"];
      $this->updated_at = $data["updated_at"];
      $this->deleted_at = $data["deleted_at"];
    }

    if (sizeof(func_get_args()) == 7){
        
      $this->id         = $arguments["id"];
      $this->student_id = $arguments["student_id"];
      $this->name       = $arguments["name"];
      $this->setGender($arguments["gender"]);
      $this->created_at = $arguments["created_at"];
      $this->updated_at = $arguments["updated_at"];
      $this->deleted_at = $arguments["deleted_at"];
    }
    //將身份代碼轉換為文字
  }

  function setGender($gender) {
    
      if($gender == 'M')
      {
        $this->gender = '男生';
      }
      else
      {
        $this->gender = '女生';
      }
  }

}
