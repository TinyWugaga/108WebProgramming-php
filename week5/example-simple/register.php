<?php

session_start();

//verified accounts
if (!isset($_SESSION["account"])) {
    header("Location:login.php");
    die();
}

$activityForm = [
  "dailyCamp" => "一日資管營 (會員$0/非會員$300)",
  "teaParty" => "新生茶會 (會員$0/非會員$150)",
  "welCamp" => "迎新生活營 (會員$3000/非會員$5500)"
];

$account = $_SESSION["account"];
$fee = $_SESSION["fee"] ?? "yes";
$activityList = $_SESSION["activity"] ?? ["dailyCamp"];

?>


<!DOCTYPE html>

<html>

<?php require("header.php")?>

<body class="page__login--class">
  <div class="wrapper">
    <div class="container">
      <div class="login-form">

        <form name="checkboxForm" class="form" action="register_process.php" method="post">
          <div class="container">
            <h3 class="form__title">CHECKBOX FORM</h3>

            <div class="form__block">

              <span class="form__input_textField">
                姓名: <input type="text" name="account" value="<?= $account ?>" />
              </span>

              <span class="form__input_textField">
                <input type="radio" name="fee" value="yes" 
                  <?php if ($fee == "yes") { echo "checked"; } ?>
                /> 已繳會費
                <input type="radio" name="fee" value="no" 
                  <?php if ($fee == "no") { echo "checked"; } ?>
                /> 未繳會費
              </span>

              <?php foreach ($activityForm as $key => $title) { ?>
                <span class="form__input_textField">
                  <input type="checkbox" name="activity[]" value=<?php echo "{$key}" ?>
                  <?php if (in_array($key, $activityList)) { echo "checked" ;} ?> />
                  <?php echo $title ?>
                </span>
              <?php } ?>
            </div>

            <button class="form__button" type="submit">SUBMIT</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>

</html>