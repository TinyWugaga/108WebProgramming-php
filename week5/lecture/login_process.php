<?php
if ($_POST["account"] == "root" && $_POST["password"] == "password" ) {
 session_start();
 $_SESSION["account"] = $_POST["account"];
 header("Location: success.php");
 
}
else {
 header("Location: login.php?msg=error");
}
?>

<?php
die();
if ($_POST["account"] == "root" && $_POST["password"] == "password" ) {
  header("Location: success.php?account=root");
}
else {
  header("Location: login.php?msg=error");
}
?>