<?php

session_start();

require __DIR__ . '/config/db.php';
require __DIR__ . '/config/sql.php';

if (empty($_POST)) {
    die('請輸入表單');
}

// =============================================================================
// = 處理送來的表單資料
// =============================================================================

$uAccount = $_POST["account"] ?? "";
$uPassword = $_POST["password"] ?? "";

// =============================================================================
// = 透過傳入的帳號 (account)，搜尋使用者
// =============================================================================

$user = findUserByAccount($conn, $uAccount);

if (! $user) {
    header("Location:login.php?msg=使用者不存在");
    die;
}

// 驗證密碼是否正確
if ($uPassword !== $user['password']) {
    header("Location:login.php?msg=密碼錯誤");
    die;
}

// =============================================================================
// = 將驗證成功的使用者名稱，保存到 SESSION。
// =============================================================================

$_SESSION['account'] = $user['account'];
$_SESSION['name'] = $user['name'];

header("Location:stickerPage.php?msg=登入成功");
