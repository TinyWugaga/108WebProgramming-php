<?php

require __DIR__ . '/etc/bootstrap.php';

$uAccount = $_POST["account"] ?? "";
$uPassword = $_POST["password"] ?? "";

//確認使用者存在，如果存在回傳該帳號資料
$user = findUserByAccount($conn, $uAccount);

//確認 User存在以及密碼符合該帳號
if (isset($user) && $uPassword == $user["password"])
{
  $_SESSION["account"] = $uAccount;
  $_SESSION["name"] = $user["name"];
  if($user["role"] == 'M'){
    $_SESSION["authority"] = 'M';
  }
}
else
{
  $msg = 'failed';
  header("Location:login.php?msg=" . $msg);
  die();
}

header("Location:stickerPage.php");
