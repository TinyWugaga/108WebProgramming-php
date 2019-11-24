<?php

require __DIR__ . '/../etc/bootstrap.php';

$uAccount = $_POST["student_id"] ?? "";
$uSeat = $_POST["seat"] ?? "";

//確認使用者存在，如果存在回傳該帳號資料
$user = findUserByAccount($conn, $uAccount);
if(!is_numeric($uSeat))
{
  $msg = '機台請輸入數字';
  header("Location:../login.php?msg=" . $msg);
  die;
}
$addSeatResult = updateUserSeat($conn, $uAccount, $uSeat);

//確認 $user非空值
if ($user)
{
  $_SESSION["userId"] = $user['id'];
}
else
{
  $msg = '找不到此學號';
  header("Location:../login.php?msg=" . $msg);
  die;
}

header("Location:../stickerPage.php");
