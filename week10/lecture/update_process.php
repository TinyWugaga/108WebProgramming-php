<?php

require 'job.php';
require 'db.php';

if (!empty($_POST))//檢查是否有資料傳入
{
    //修改資料表欄位
    $sql = "update job set company=:company, content=:content, pdate=:pdate where postid=:postid";
    $stmt = $conn->prepare($sql);

    //$_POST新建物件 將資料進行預處理
    $job = new Job($_POST);

    //execute()只能傳入陣列 要將$job物件轉換成陣列
    $stmt->execute($job->toArray());
    
    $conn = null;
    header('location:query.php');
}
else
{
    echo "ERROR";
}
