<?php
//get post
$account = $_POST["account"] ?? "";
$fee = $_POST["fee"] ?? "";
$activityList = $_POST["activity"] ?? ["N/A"];

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

                <form name="checkboxForm" class="form" action="./login.php" method="post">
                    <div class="container">
                        <h3 class="form__title">CHECKBOX FORM</h3>

                            <div class="form__block">
                                <span class="form__input_textField">
                                    姓名: <?php echo $account ?>
                                </span>
                                <span>
                                    費用總計：NT$ <?php countPrice(); ?>
                                </span>
                            </div>

                        <button class="form__button" type="submit">BACK</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>