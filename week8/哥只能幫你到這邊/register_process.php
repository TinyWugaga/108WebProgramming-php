<?php

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
$uName = $_POST["name"] ?? "";

/* =============================================================================
 * = 確認帳號是否存在
 * =============================================================================
**/

if (1) {
    
    $user = findUserByAccount($conn, $uAccount);

} else {
    
    // 首先我們用 account 欄位搜尋使用者。
    $query = $conn->prepare('SELECT * FROM `users` WHERE `account`=:account');
    $query->execute(['account' => $uAccount]);

    // 然後我們判斷有沒有查詢到結果。若有，則跳轉頁面，並中止程式。
    $user = $query->fetch();
    
}

if ($user) {
    header("Location:register.php?msg=使用者已存在");
    die;
}

/* =============================================================================
 * = 新增使用者
 * =============================================================================
**/

$state = createUser($conn, [
    'account' => $uAccount,
    'password' => $uPassword,
    'name' => $uName,
]);

// 若執行成功，則跳轉回註冊頁面。
if ($state) {
    header("Location:login.php?msg=新增成功");
} else {
    die('新增失敗');
}
