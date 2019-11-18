<?php

require __DIR__ . '/../etc/bootstrap.php';

//確認是否有修改表單資料
if (!empty($_POST)) {

    // =============================================================================
    // = 處理送來的表單資料
    // =============================================================================

    $id = $_POST["id"] ?? "";
    $student_id = $_POST["student_id"] ?? "";
    $name = $_POST["name"] ?? "";
    $gender = $_POST["gender"] ?? "";

    /* =============================================================================
     * = 修改使用者資料
     * =============================================================================
    **/

    $updateResult = updateStudent($conn, $id, [
        'student_id' => $student_id,
        'name'       => $name,
        'gender'     => $gender,
    ]);

    // 跳轉並將結果帶回修改頁面。
    header("Location:todoList.php?edit={$id}&result={$updateResult}");
    die();
}

header("Location:todoList.php");
