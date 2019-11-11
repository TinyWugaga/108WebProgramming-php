<?php

session_start();

/*HW--> 完成自訂使用者清單 */
// [] ==  array()
$users = [

  "student1"=>"1", 
  "student2"=>"2",
  "student3"=>"3",
  
];

// =============================================================================
// = 處理送來的表單資料
// =============================================================================

$uAccount = $_POST["account"] ?? "";
$uPassword = $_POST["password"] ?? "";

// =============================================================================
// = HW--> 確認使用者存在以及密碼符合該帳號
// =============================================================================

if (isset($users[$uAccount]) && $uPassword == $users[$uAccount])
{
  $_SESSION["account"] = $uAccount;
}
else
{
  $msg = 'failed';
  header("Location:login.php?msg=" . $msg);
  die();
}

header("Location:stickerPage.php");
