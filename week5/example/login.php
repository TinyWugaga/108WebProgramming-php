<?php

session_start();

if (isset($_SESSION["account"]))
{
    header("Location:login_process.php");
};

//verified accounts
$msg = isset($_GET["msg"]) ? "帳號密碼輸入錯誤" : "";

?>

<!DOCTYPE html>
<html>

<?php require("header.php")?>

<body class="page__login">

    <div class="wrapper">
        <div class="container">
            <div class="page-form ">
                <form id="userForm" class="form" action="login_process.php" method="post">
                    <div class="container form__container">

                        <h3 class="form__title">CHECKBOX FORM</h3>
                        <div class="form__input">
                            <div class="container form__input_container">

                                <span class="form__notice"><?= $msg ?></span>
                                <span class="form__input_textField ">
                                    ACCOUNT:<input type="text" name="account" required="required" />
                                </span>
                                <span class="form__input_textField ">
                                    PASSWORD:<input type="text" name="password" required="required" />
                                </span>
                                
                            </div>
                        </div>
                        <button class="form__button" type="submit">LOGIN</button>
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