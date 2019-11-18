<?php

require __DIR__ . '/../models/students.php';

// =============================================================================
// = Students
// =============================================================================

/**
 * 依照給予的ID，取得學生
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $id      要搜尋的學生ID
 * @return array
 */
function findStudentById($conn, $id)
{
    $stmt = $conn->prepare('SELECT * FROM `todo_list` WHERE `id`=:id AND `deleted_at` IS NULL');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * 依照給予的學號，取得學生
 * 
 * @param  PDO $conn         PDO實體
 * @param  string $studentId   要搜尋的學生學號
 * @return array
 */
function findStudentByStudentId($conn, $studentId)
{
    $stmt = $conn->prepare('SELECT * FROM `todo_list` WHERE `student_id`=:student_id AND `deleted_at` IS NULL');
    $stmt->execute(['student_id' => $studentId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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

    $sql = "SELECT * FROM `todo_list` WHERE `{$field}`  LIKE :search AND `deleted_at` IS NULL ORDER BY `{$sort}` ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['search' => "%{$search}%"]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Students');
}

/**
 * 新增學生
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的學生資料
 * @return boolean       執行結果
 */
function createStudent($conn, $data = [])
{
    $stmt = $conn->prepare(
        'INSERT INTO `todo_list` (`student_id`, `name`, `gender`, `created_at`, `updated_at`, `deleted_at`) VALUES (:student_id, :name, :gender, :created_at, :updated_at, :deleted_at)'
    );
    
    return $stmt->execute([
        'student_id' => $data['student_id'],
        'name'       => $data['name'],
        'gender'     => $data['gender'],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
        'updated_at' => $data['updated_at'] ?? null,
        'deleted_at' => $data['deleted_at'] ?? null,
    ]);
}

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
    $stmt = $conn->prepare(
        "UPDATE `todo_list` SET `student_id`=:student_id, `name`=:name, `gender`=:gender, `updated_at`=:updated_at WHERE `id`={$id}"
    );
    
    return $stmt->execute([
        'student_id' => $data['student_id'],
        'name'       => $data['name'],
        'gender'     => $data['gender'],
        'updated_at' => $data['updated_at'] ?? date('Y-m-d H:i:s'),
    ]);

}

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
