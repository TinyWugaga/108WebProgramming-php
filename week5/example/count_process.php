<?php

session_start();

//verified accounts
if (!isset($_SESSION["account"])) {
    header("Location:login.php");
    die();
}


//get account from post ??  session
$account = $_POST["account"] ?? $_SESSION["account"];
$form = isset($_POST) ? [
    "fee" => $_POST["fee"] ?? "",
    "activityList" => $_POST["activity"] ?? ["N/A"],
] : $_SESSION["form"];

//save to session
$_SESSION["account"] = $account;
$_SESSION["form"] = $form;

//set price
$fee = $form["fee"];
$activityList = $form["activityList"];

$priceList = [

    "dailyCamp" => ($fee == "yes") ? 0 : 300,
    "teaParty" => ($fee == "yes") ? 0 : 150,
    "welCamp" => ($fee == "yes") ? 3000 : 5500,
    "N/A" => 0
];

//echo '<pre>';var_dump($_SESSION);

function countPayment()
{
    global $account, $priceList, $fee, $activityList;

    $payment = $fee == "yes" ? 2000 : 0;
    foreach ($activityList as $activity) {
        $payment += $priceList[$activity];
    }

    echo  $account . '的費用總計：' . $payment;
}

?>

<!DOCTYPE html>
<html>

<?php require("header.php")?>

<body class="page__count">

    <div class="wrapper">
        <div class="container">
            <div class="page-form ">
                <div class="form">
                    <div class="container form__container">
                        <span class="form__text"><?php countPayment() ?></span>
                        <div class="form_block">
                        <a href="login_process.php"><input class="form__button" type="button" value="BACK" /></a>
                        <a href="logout.php"><input class="form__button" type="button"" value="LOGOUT" /></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="entry" id="poptart">
                <div class="no-scale">
                </div>
            </div>
        </div>
    </div>

</body>

</html>