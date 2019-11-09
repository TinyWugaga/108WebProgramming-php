<?php
session_start();
if (isset($_SESSION["account"])){
 echo "welcome, ".$_SESSION["account"]."!<p>";
 echo "<a href='login.php'>login.php</a><p>";
 echo "<a href='success2.php'>success2.php</a>";
}
else {
 header("Location: login.php");
}

?>