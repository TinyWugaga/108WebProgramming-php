<?php
session_start();
unset($_SESSION["post"]);
header("Location: register.php");

?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

 <a href="register.php">重新輸入</a>

</body>

</html>