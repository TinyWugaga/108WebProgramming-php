<?php

require __DIR__ . '/../models/students.php';

// =============================================================================
// = Students
// =============================================================================

//* HW ================================================>
/** 
 * 依照給予的ID，取得學生
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $id      要搜尋的學生ID
 * @return array
 */
function findStudentById($conn, $id)
{
    
    $sql = /*完成 sql*/ "WHERE `id`= {$id} AND `deleted_at` IS NULL";
    //prepare($sql = 從 `todo_list` 資料表獲取符合 學生編號 且 未刪除 的學生資料)

    //execute()

    //return fetch(用陣列型態獲取的學生資料)
    return null;
}
//* ================================================ HW >

//* HW ================================================>
/**
 * 依照給予的學號，取得學生
 * 
 * @param  PDO $conn            PDO實體
 * @param  string $studentId   要搜尋的學生學號
 * @return array
 */
function findStudentByStudentId($conn, $studentId)
{
    $sql = /*完成 sql*/ 'WHERE `student_id`= :student_id AND `deleted_at` IS NULL';
    //prepare($sql = 從 `todo_list` 資料表獲取符合 學生學號 且 未刪除 的學生資料)

    //execute(綁定變數)

    //return fetch(用陣列型態獲取的學生資料)
    return null;
}
//* ================================================ HW >

//* HW ================================================>
/**
 * 依照給予的欄位與關鍵字，取得符合的學生
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $search  要搜尋的關鍵字
 * @param  string $field   要依此搜尋關鍵字的欄位
 * @param  string $sort    要依此排序結果的欄位
 * @return object
 */
function findStudentLikeSearch($conn, $search, $field, $sort)
{
    $sql = "SELECT * FROM `todo_list` WHERE `{$field}` LIKE :search AND `deleted_at` IS NULL ORDER BY `{$sort}` ASC";
    //prepare($sql = 從 `todo_list` 資料表獲取 部分搜尋欄位符合關鍵字 且 未刪除 的學生資料 並依排序欄位遞增排列)

    //execute(綁定變數)

    //return fetchAll(用物件型態獲取的學生資料)
    return null;
}
//* ================================================ HW >

//* HW ================================================>
/**
 * 新增學生
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的學生資料
 * @return boolean       執行結果
 */
function createStudent($conn, $data = [])
{
    //prepare($sql = 新建 `todo_list` 資料為(`student_id`, `name`, `gender`, `created_at`, `updated_at`, `deleted_at`) 的新學生資料)

    $addStudent = [
        'student_id' => $data[''],
        'name'       => $data[''],
        'gender'     => $data[''],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
        'updated_at' => $data['updated_at'] ?? null,
        'deleted_at' => $data['deleted_at'] ?? null,
    ];
    //execute(綁定變數)

    //return 新建學生資料結果
    return null;
}
//* ================================================ HW >

//* HW ================================================>
/**
 * 修改學生資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要修改的學生編號
 * @param  array $data   要修改的學生資料
 * @return boolean       執行結果
 */
function updateStudent($conn, $id, $data = [])
{    
    //prepare($sql = 修改 `todo_list` 欄位(`student_id`, `name`, `gender`, 'updated_at') 且 `id`={$id} 的學生資料)

    $updateStudent = [
        'student_id' => $data[''],
        'name'       => $data[''],
        'gender'     => $data[''],
        'updated_at' => $data['updated_at'] ?? date('Y-m-d H:i:s'),
    ];

    //execute(綁定變數)

    //return 修改學生資料結果
    return null;

}
//* ================================================ HW >

/**
 * 軟刪除學生資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要刪除的學生編號
 * @return boolean       執行結果
 */
function deleteStudent($conn, $id)
{    
    $stmt = $conn->prepare(
        "UPDATE `todo_list` SET `deleted_at`= CURRENT_TIME() WHERE `id`={$id}"
    );
    
    return $stmt->execute();
}
