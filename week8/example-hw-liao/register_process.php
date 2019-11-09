<?php

require __DIR__ . '/etc/bootstrap.php';

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
 * = 確認註冊帳號是否重複
 * =============================================================================
**/

// 首先我們用 account 欄位搜尋使用者。
$query = $conn->prepare('SELECT * FROM `users` WHERE `account`=:account');
$query->execute(['account' => $uAccount]);

// 然後我們判斷有沒有查詢到結果。若有，則跳轉頁面，並中止程式。
$user = $query->fetch();
if ($user) {
    header("Location:register.php?msg=使用者已存在");
    die;
}

/* =============================================================================
 * = 新增使用者
 * =============================================================================
**/

// 因為太長了，所以我們宣告一個 $sql 變數來儲存 SQL 命令。
$sql = <<<HEREDOC
INSERT INTO `users` (account, password, name, created_at)
VALUES (:account, :password, :name, :created_at)
HEREDOC;

$query = $conn->prepare($sql);


// 執行新增命令，將我們的資料傳進去。
$state = $query->execute([
    'account' => $uAccount,
    'password' => $uPassword,
    'name' => $uName,
    'created_at' => date('Y-m-d'),
]);

// 若執行成功，則跳轉回註冊頁面。
if ($state) {
    header("Location:login.php?msg=新增成功");
} else {
    die('新增失敗');
}
