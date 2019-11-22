<?php

session_start();

if (isset($_SESSION["account"])) {
  header("Location:stickerPage.php");
};

//verified failed msg
$msg = $_GET["msg"] ?? "";

?>

<!DOCTYPE html>

<html>

<?php include("header.php") ?>

<body class="page__login">
  <div class="wrapper">
    <div class="container">

      <div class="class__board">
        <div class="class__board_inner">
          <div class="class__board_logo">
            <h1 class="class__board_title">WEB MID-EXAM ver.B</h1>
          </div>

          <p class="class__board_notice"> <?= $msg ?></p>

          <div class="class__board_block">
            <form class="class__form" name="loginForm" action="controllers/login_process.php" method="post">
              <div class="class__form_textField">
                <label class="form__textField_label">學號</label>
                <input type="text" name="student_id" placeholder="學號" required autocapitalize="off" autocorrect="off" spellcheck="false">
              </div>
              <div class="class__form_textField">
                <label class="form__textField_label">機台</label>
                <input type="text" name="seat" placeholder="機台" required>
              </div>
              <div class="class__form_btn">
                <button type="submit" class="btn submit__btn">開始作答</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>

</html>