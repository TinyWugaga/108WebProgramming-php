<?php

require __DIR__ . '/../etc/bootstrap.php';

$uAccount = $_POST["student_id"] ?? "";
$uName = $_POST["name"] ?? "";

//確認使用者存在，如果存在回傳該帳號資料
$user = findUserByAccount($conn, $uAccount);
$addNameResult = updateUserName($conn, $uAccount, $uName);

//確認 $user非空值 以及密碼符合該帳號
if ($user)
{
  $_SESSION["userId"] = $user['id'];
}
else
{
  $msg = '找不到此學號';
  header("Location:../login.php?msg=" . $msg);
  die();
}

header("Location:../stickerPage.php");
