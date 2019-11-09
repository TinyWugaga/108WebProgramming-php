<?php
session_start();
$postData = $_SESSION["post"] ?? "[]";
$name = $postData["name"] ?? "";
$email = $postData["email"] ?? "";
$website = $postData["website"] ?? "";
$comment = $postData["comment"] ?? "";
$gender = $postData["gender"] ?? "";

$maleChecked = ($gender=="male")?"checked":"";
$femaleChecked = ($gender=="female")?"checked":"";
$otherChecked = ($gender=="other")?"checked":"";

?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

 <form action="register_process.php" method="post">
  Name: <input type="text" name="name" value="<?= $name?>"><br>

  E-mail: <input type="text" name="email" value="<?= $email?>"><br><br>

  Website: <input type="text" name="website" value="<?= $website?>"><br>

  Comment: <textarea name="comment" rows="5" cols="40"><?= $comment?></textarea><br>

  Gender:
  <input type="radio" name="gender" <?=$femaleChecked?> value="female">Female
  <input type="radio" name="gender" <?=$maleChecked?> value="male">Male
  <input type="radio" name="gender" <?=$otherChecked?> value="other">Other
  <br>
  <input type="submit" value="送出">

 </form>

</body>

</html>