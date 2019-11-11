<?php

session_start();
require 'config/db.php';
require 'config/sql.php';
require 'models/users.php';

//register new User 
if (!empty($_POST)) {


    // =============================================================================
    // = 處理送來的表單資料
    // =============================================================================
    $uAccount = $_POST["account"] ?? "";
    $uPassword = $_POST["password"] ?? "";
    $uName = $_POST["name"] ?? "";

    // =============================================================================
    // = 確認註冊帳號是否重複
    // =============================================================================

    // 首先用 account 欄位搜尋使用者。
    $query = $conn->prepare('SELECT * FROM `users` WHERE `account`=:account');
    $query->execute(['account' => $uAccount]);

    // 然後判斷有沒有查詢到結果。若有，則跳轉頁面，並中止程式。
    $user = $query->fetch();
    if ($user) {
        $msg = 'account_existed';
        header("Location:register.php?msg=" . $msg);
        die;
    }
    // =============================================================================
    // = HW--> 新增使用者
    // =============================================================================

    /*
        成功 $addResult = 1
        失敗 $addResult = 0
        ....
        $addResult = 

        //$state = $query->execute([]);
        //給個提示
        //execute成功 $state 會是true；
    */

    $stmt = $conn->prepare($insertUser);
    $addResult = $stmt->execute([
        'account' => $uAccount,
        'password' => $uPassword,
        'name' => $uName,
        'created_at' => date('Y-m-d'),
    ]);
    $conn = null;

    header("Location:register.php?result=" . $addResult);
    die();
}

header("Location:stickerPage.php");
