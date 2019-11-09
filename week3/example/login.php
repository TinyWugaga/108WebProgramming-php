<?php

$msg = $_GET["msg"] ?? "";

?>

<!DOCTYPE html>

<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- RWD Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/wp_hw_test/web.css?v=1.0.0">

  <!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="page__login--class">
  <div class="wrapper">
    <div class="container">
      <div class="login-form">

        <form name="checkboxForm" class="form" action="./login_process.php" method="post">
          <div class="container">
            <h3 class="form__title">CHECKBOX FORM</h3>
            
            <span class="form__notice">
              <?php if($msg){ echo $msg."。請重新輸入帳號密碼"; } ?>
            </span>
            
              <div class="form__block">
                <i class="icon icon_number">1</i>
                <span class="form__input_textField">
                  帳號: <input type="text" name="account">
                </span>
                <span class="form__input_textField">
                  密碼: <input type="password" name="password">
                </span>
              </div>

            <button class="form__button" type="submit">LOGIN</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>

</html>