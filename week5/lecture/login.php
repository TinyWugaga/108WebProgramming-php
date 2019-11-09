<?php
$message = isset($_GET["msg"]) ? "帳號密碼錯誤</br>" : "";
?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

 <form action="login_process.php" method="post">
  <?= $message ?>
  帳號: <input type="text" name="account"><br>
  密碼: <input type="password" name="password"><br>
  <input type="submit" value="登入">
 </form>

</body>

</html>
