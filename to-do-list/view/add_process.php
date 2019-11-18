<?php

require __DIR__ . '/../etc/bootstrap.php';

//register new User 
if (!empty($_POST)) {

    // =============================================================================
    // = 處理送來的表單資料
    // =============================================================================

    $student_id = $_POST["student_id"] ?? "";
    $name = $_POST["name"] ?? "";
    $gender = $_POST["gender"] ?? "";

    /* =============================================================================
     * = 確認帳號是否存在
     * =============================================================================
    **/

    $student = findStudentByStudentId($conn, $student_id);

    if ($student) {
        header("Location:register.php?msg=使用者已存在");
        die;
    }

    /* =============================================================================
     * = 新增使用者
     * =============================================================================
    **/

    $addResult = createStudent($conn, [
        'student_id' => $student_id,
        'name'       => $name,
        'gender'     => $gender,
    ]);

    // 跳轉並將結果帶回註冊頁面。
    header("Location:todoList.php?result={$addResult}");
    die();
}

header("Location:todoList.php");
