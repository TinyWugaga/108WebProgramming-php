<?php
session_start();
require 'cart.php';

$id = $_POST["id"] ?? "0";
$qty = $_POST["qty"] ?? "1";
//initialize session for first item
if (!isset($_SESSION["cart"])){
  $_SESSION["cart"]=[];
}

array_push($_SESSION["cart"], new Cart($id,$qty));

var_dump($_SESSION["cart"]);
header("Location: cartList.php");
?>