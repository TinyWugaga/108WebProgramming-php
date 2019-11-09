<?php

session_start();

//User List
$users = [
  "student1" => "1",
  "student2" => "2",
  "student3" => "3",
];

if(isset($_POST["account"]))
{
  $account = $_POST["account"] ?? "";
  $password = $_POST["password"] ?? "";

  if (isset($users[$account]) && $password == $users[$account]) {
    $_SESSION["account"] = $account;
    $_SESSION["authority"] = "admin";
  } else {
    $msg = 'failed';
    header("Location:login.php?msg=" . $msg);
    die();
  }
}

header("Location:productList.php");

?>