<?php

session_start();

//verified accounts
if (!isset($_SESSION["account"])) {
    header("Location:login.php");
    die();
}

//get session
$account = $_SESSION["account"];
$fee = $_SESSION["fee"];
$activityList = $_SESSION["activity"];

//count payment
function countPrice()
{
    global $fee, $activityList;

    $payment = $fee == "yes" ? 2000 : 0;
    $priceList = [
        "dailyCamp" => ($fee == "yes") ? 0 : 300,
        "teaParty" => ($fee == "yes") ? 0 : 150,
        "welCamp" => ($fee == "yes") ? 3000 : 5500,
        "N/A" => 0, "" => 0
    ];

    foreach ($activityList as $activity) {
        $payment += $priceList[$activity];
    }

    echo $payment;
}

?>


<!DOCTYPE html>

<html>

<?php require("header.php")?>

<body class="page__login--class">
    <div class="wrapper">
        <div class="container">
            <div class="login-form">

                <div class="form" >
                    <div class="container">
                        <h3 class="form__title">CHECKBOX FORM</h3>

                            <div class="form__block">
                                <span class="form__input_textField">
                                    姓名: <?= $account ?>
                                </span>
                                <span>
                                    費用總計：NT$ <?php countPrice(); ?>
                                </span>
                            </div>
                            <div class="form__block">
                                <a href="register.php"><input class="form__button" type="button" value="BACK"></a>
                                <a href="logout_process.php"><input class="form__button" type="button" value="LOGOUT"></a>
                            </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>