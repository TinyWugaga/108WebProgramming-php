<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

 <form action="conference_process.php" method="post">

  name:<input type="text" name="name" /><br>
  <input type="checkbox" name="program[]" value="am" checked="checked" /> 上午場 ($150)
  <input type="checkbox" name="program[]" value="pm" /> 下午場 ($100) <br />
  <input type="checkbox" name="program[]" value="lunch" checked="checked" /> 午餐 ($60)
  <input type="submit" value="Submit" />

 </form>

</body>

</html>