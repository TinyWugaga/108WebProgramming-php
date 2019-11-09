<?php

session_start();

if (isset($_SESSION["account"])) {
  header("Location:query.php");
};

//verified accounts
$msg = isset($_GET["msg"]) ? "帳號密碼輸入錯誤" : "";

?>

<!DOCTYPE html>

<html>

<?php require("header.php") ?>

<body class="page__class">
  <div class="wrapper">
    <div class="container">
      <div class="page__class_card">

        <form name="checkboxForm" class="form" action="login_process.php" method="post">
          <div class="container">
            <h3 class="form__title">DATABASE TABLE</h3>

            <span class="form__notice"> <?= $msg ?></span>

            <div class="form__block">
              <span class="form__input_textField">
                帳號: <input type="text" name="account" required="required">
              </span>
              <span class="form__input_textField">
                密碼: <input type="password" name="password" required="required">
              </span>
            </div>

            <div class="form__block">
              <input class="class__button" type="submit" value="LOGIN" />
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>

</body>

</html>