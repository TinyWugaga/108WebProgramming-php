<?php

session_start();

//verified accounts
if (!isset($_SESSION["account"])) {
    header("Location:login.php");
    die();
}

//get post
$account = $_POST["account"] ?? $_SESSION["account"];
$fee = $_POST["fee"] ?? $_SESSION["fee"];
$activityList = $_POST["activity"] ?? $_SESSION["activity"];

//save in session
$_SESSION["account"] = $account;
$_SESSION["fee"] = $fee;
$_SESSION["activity"] = $activityList;

header("Location:count.php");

?>