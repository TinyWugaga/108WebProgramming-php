<?php
//user list
$users = [

  "student1" => "1",
  "student2" => "2",
  "student3" => "3",

];
//get login post
$account = $_POST["account"] ?? "" ;
$password = $_POST["password"] ?? "" ;

// verify account of user
if (!$users[$account] || $users[$account] != $password) {

    $msg = "使用者".$account."認證失敗";
    header("Location: ./login.php?msg=".$msg);
  }

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
  <link rel="stylesheet" href="/wp_hw_test/web.css?v=1.0.1">

  <!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="page__login--class">
  <div class="wrapper">
    <div class="container">
      <div class="login-form">

        <form name="checkboxForm" class="form" action="./count_process.php" method="post">
          <div class="container">
            <h3 class="form__title">CHECKBOX FORM</h3>
            <span class="form__notice">登入成功！</span>

              <div class="form__block">
                <i class="icon icon_number">1</i>
                <span class="form__input_textField">
                  姓名: <?php echo $account ?>
                  <input type="hidden" name="account" value="<?php echo $account ?>" />
                </span>

                <span class="form__input_checkbox">
                  <input type="radio" name="fee" value="yes" checked="checked" /> 已繳會費
                  <input type="radio" name="fee" value="no" /> 未繳會費
                </span>
                <span class="form__input_checkbox">
                  <input type="checkbox" name="activity[]" value="dailyCamp" checked="checked" /> 一日資管營
                  <input type="checkbox" name="activity[]" value="teaParty" /> 新生茶會
                </span>
                <span class="form__input_checkbox">
                  <input type="checkbox" name="activity[]" value="welCamp" /> 迎新生活營
                </span>
              </div>


            <button class="form__button" type="submit">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>

</html>