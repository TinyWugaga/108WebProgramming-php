<?php
session_start();
if (isset($_SESSION["account"])){
 echo "welcome, ".$_SESSION["account"]."!<p>";
 echo "<a href='login.php'>login.php</a><p>";
 echo "<a href='success.php'>success.php</a>";
}
else {
 header("Location: login.php");
}

?>