<?php
session_start();
$_SESSION["post"] = $_POST ?? "[]";

?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>
 <a href="register_clear.php">重新填寫</a><br>
 <a href="register.php">修改</a>

</body>

</html>

