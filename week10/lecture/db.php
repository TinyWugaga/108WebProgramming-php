<?php
  $servername = "localhost";
  $dbname = "practice";
  $username = "root";
  $password = "root";


  try
  { // 初始化 PDO 對象$conn

    //$dsn = “數據庫類型 :  主機地址;  資料庫名” ,  連接用戶, 用戶密碼
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    //PDO 設置屬性（這邊設定的是  錯誤報告, 拋出 exceptions 異常）
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //PDO 連接成功印出訊息
    echo "Connected successfully"; 
  }
  catch(PDOException $e)//接取 PDO 拋出錯誤
  {
    echo "Connection failed: " . $e->getMessage(); //PDO 連接失敗印出訊息，並拋出錯誤內容
  }
