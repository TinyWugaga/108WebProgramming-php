<?php

  require 'job.php';
  require 'db.php';//require 資料庫設定，便可以直接使用新建的PDO物件

  if ( !empty($_POST)) //防止無傳入資料
  {
    /* =============================================================================
    * = 使用PDO prepare函式執行新增求才公告
    * =============================================================================
    **/

    //資料庫語法，即SQL指令，帶入值使用變數。
    $sql="insert into job (company, content, pdate) values (:company, :content, :pdate)";
    $stmt = $conn->prepare($sql);//為防止 sql injection，使用 prepare函數

    //將表單資料新建 Job物件進行處理
    $job = new Job($_POST);

    //利用 bindValue 對應 $sql裡的 values 綁定變數
    $stmt->bindValue(':company', $job->company);
    $stmt->bindValue(':content', $job->content);
    $stmt->bindValue(':pdate', $job->pdate);
    $stmt->execute();

    /* =============================================================================
    * = 利用 execute() 帶入關聯性陣列 取代 bindValue
    * =============================================================================
    **/

    //如果要利用物件先進行資料處理再帶入execute，則需要進行資料轉換
    //變數會對應到相同名稱的Key 自動綁定Value
    $jobArray= $job -> toArrayInsert();//將 Job物件轉換成陣列
    $stmt->execute($jobArray); //將轉換的 Job陣列帶入execute 執行

    //execute執行兩次所以會建立兩筆一樣的資料
    
    $conn = null;//關閉PDO物件連結
    header('location:query.php');
  }
  else {
    echo "ERROR";
  }

?>
