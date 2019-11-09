<?php

session_start();

//User List
$users = [
    "student1" => "1",
    "student2" => "2",
    "student3" => "3",
];

$activityForm = [
    "dailyCamp" => "一日資管營 (會員$0/非會員$300)",
    "teaParty" => "新生茶會 (會員$0/非會員$150)",
    "welCamp" => "迎新生活營 (會員$3000/非會員$5500)"
];

//Back to form
if (!isset($_SESSION["account"]) && !isset($_POST["account"])) {

    header("Location: ./login.php");

} else {
    //Get post account
    if (isset($_POST["account"])) {
        $account = $_POST["account"] ?? "";
        $password = $_POST["password"] ?? "";
        //verify user
        if (isset($users[$account]) && $password == $users[$account]) {
            $_SESSION["account"] = $account;
            $_SESSION["form"] = [
                "fee" => "yes",
                "activityList" => ["dailyCamp"],
            ];
        }
        else{
            $msg = '帳號密碼錯誤';
            header("Location: ./login.php?msg=" . $msg);
            die();
        }
    }
    $account = $_SESSION["account"];
    $form = $_SESSION["form"];
    $fee = $form["fee"];
    $activityList = $form["activityList"];
}


?>

<!DOCTYPE html>
<html>

<?php require("header.php")?>

<body class="page__login">

    <div class="wrapper">
        <div class="container">
            <div class="page-form">
                <form id="userForm" class="form" action="count_process.php" method="post">
                    <div class="container form__container">

                        <h3 class="form__title">CHECKBOX FORM</h3>

                        <div class="form__input">
                            <div class="container form__input_container">
                                <span class="form__input_textField">
                                    NAME:<input type="text" name="account" value="<?= $account ?>" />
                                </span>
                                <span class="form__input_textField">
                                    <input type="radio" name="fee" value="yes" 
                                        <?php if( $fee == "yes" ){ echo "checked"; } ?>
                                    /> 已繳會費
                                    <input type="radio" name="fee" value="no" 
                                        <?php if( $fee == "no" ){ echo "checked"; } ?>
                                    /> 未繳會費
                                </span>
                                <?php foreach ($activityForm as $key => $title) { ?>
                                    <span class="form__input_textField">
                                        <input type="checkbox" name="activity[]" value="<?= $key ?>" 
                                            <?= in_array($key, $activityList) ? "checked" : "" ; ?> />
                                        <?= $title ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form__block">
                            <input class="form__button" type="submit" value="SUBMIT" />
                            <a href="logout.php"><input class="form__button" type="button"" value="LOGOUT" /></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="entry" id="poptart">
                <div class="no-scale">
                </div>
            </div>
        </div>
    </div>

</body>

</html>