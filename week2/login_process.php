<?php

$account = $_POST["account"];
$password = $_POST["password"];


if ($account == 'root' && $password == 'password') {
    header("Location:success.php");
} else {
  header("Location:login.php?login=fail");
}


?>
