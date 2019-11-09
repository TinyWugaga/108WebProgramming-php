<?php
session_start();

$clear = $_GET["clear"] ?? "";
unset($_SESSION[$clear]);

switch ($clear){
    case "account" :
    unset($_SESSION["authority"]);
    header("Location: productList.php");
    break;
    case "cart" :
    header("Location: cartList.php");
    break;
    default:
    session_destroy();
    header("Location: productList.php");
}
