<?php

  //資料庫連線設定
  $servername = "localhost";
  $dbname = "practice";
  $username = "web_class";
  $password = "2333";
  
  try
  {
    $conn = new PDO(
      //mysql:"主機;資料庫名稱;",使用者帳號,使用者密碼
      "mysql:host=$servername;dbname=$dbname;",
      $username, $password
    );
    //設定 PDO錯誤型態
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)//拋出錯誤訊息
  {
    echo "Connection failed: " . $e->getMessage();
  }
