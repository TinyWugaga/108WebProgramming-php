<?php

session_start();

if (isset($_SESSION["account"])) {
  header("Location:productList.php");
};

//verified accounts
$msg = "";
if (isset($_GET["msg"])) {
  switch ($_GET["msg"]) {
    case "nolog":
      $msg = "請登入以使用進階功能";
      break;
    case "failed":
      $msg = "帳號密碼錯誤";
      break;
  }
}

?>

  <!DOCTYPE html>

  <html>

  <?php require("header.php") ?>

  <body class="page__class">
    <div class="wrapper">
      <div class="container">
        <div class="login-form">

          <form name="cartObject" class="form" action="login_process.php" method="post">
            <div class="container">
              <h3 class="form__title">Cart with Object</h3>
              <span class="form__notice"> <?= $msg ?></span>
              <div class="form__block">
                <span class="form__input_textField">
                  帳號: <input type="text" name="account" required="required">
                </span>
                <span class="form__input_textField">
                  密碼: <input type="password" name="password" required="required">
                </span>
              </div>
              <div class="form__block form__block--button">
                <input class="class__button" type="submit" value="LOGIN" />
                <a href="login_process.php?authority=visitor">
                  <input class="class__button" type="button" value="VISITOR" />
                </a>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

  </body>

  </html>