<?php

session_start();

//User List
$users = [
  "student1" => "1",
  "student2" => "2",
  "student3" => "3",
];

$account = $_POST["account"] ?? "";
$password = $_POST["password"] ?? "";

if (isset($users[$account]) && $password == $users[$account]) {
  $_SESSION["account"] = $account;
  header("Location:register.php");
} else {
  $msg = 'failed';
  header("Location:login.php?msg=" . $msg);
  die();
}

?>