<?php
class Students
{

  private $id;
  private $student_id;
  private $name;
  private $gender;
  private $created_at;
  private $updated_at;
  private $deleted_at;

  function __set($variable, $value)
  {
    if ($variable == "gender") {
      $this->setGender($value);
    }

    $this->$variable = $value;
  }

  function __get($variable)
  {
    return $this->$variable;
  }

  /**
   * 建構式
   */
  public function __construct(array $data = [])
  {
    $this->fill($data);
    $this->gender = $this->parseGender($this->gender);
  }

  /**
   * 填充屬性
   */
  protected function fill(array $data)
  {
    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->{$key} = $value;
      }
    }
  }

  /**
   * 處理性別
   */
  protected function parseGender($gender)
  {
    return ($gender == 'M') ? '男生' : '女生';
  }
}
