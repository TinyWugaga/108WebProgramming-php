<?php

require __DIR__ . '/etc/bootstrap.php';

$uAccount = $_POST["account"] ?? "";
$uPassword = $_POST["password"] ?? "";

//確認使用者存在，如果存在回傳該帳號資料
$user = findUserByAccount($conn, $uAccount);

//確認 User存在以及密碼符合該帳號
if (''/*HW--> 完成驗證登入帳號是否符合資料庫使用者 */)
{
  $_SESSION["account"] = $uAccount;
  $_SESSION["name"] = $user["name"];
  if(''/*HW-->  完成判斷登入帳號身份別驗證 */){

    $_SESSION["authority"] = 'M';//記錄登入身份別為管理者
  }
}
else
{
  $msg = 'failed';
  header("Location:login.php?msg=" . $msg);
  die();
}

header("Location:stickerPage.php");
