<?php

require __DIR__ . '/../models/users.php';
require __DIR__ . '/../models/stickers.php';

// =============================================================================
// = Users
// =============================================================================

/**
 * 獲取所有欄位名稱
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的使用者資料
 * @return boolean       執行結果
 */
function fetchAllUsersField($conn)
{
    $stmt = $conn->prepare('SHOW COLUMNS FROM `users`');
    $stmt->execute();

    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function fieldName($column) {
        return $column['Field'];
    }
    
    return array_map('fieldName', $columns);
}

/**
 * 取得所有使用者
 * 
 * @param  PDO $conn    PDO實體
 * @return object
 */
function fetchAllUser($conn)
{
    $stmt = $conn->prepare('SELECT * FROM `users`');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Users');
}

/** < HW ====================================== >
 * 依照給予的帳號，取得使用者
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $account 要搜尋的使用者帳號
 * @return array
 */
function findUserByAccount($conn, $account)
{
    //prepare(搜尋users資料表中 帳號 = $account的使用者)

    //回傳 以陣列型態fetch(搜尋到的使用者資訊) 
    return '';
}
/** < ====================================== HW >

/** < HW ====================================== >
/**
 * 依照給予的欄位與關鍵字，取得符合的使用者
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $search  要搜尋的關鍵字
 * @param  string $field   要依此搜尋關鍵字的欄位
 * @param  string $sort    要依此排序結果的欄位
 * @return object
 */
function findUserLikeSearch($conn, $search, $field, $sort)
{
    $sql = "SELECT * FROM `users` WHERE `{$field}` LIKE :search ORDER BY `{$sort}` ASC";
    //prepare(搜尋users資料表中 $field 含有 $search 關鍵字的使用者 且依 $sort 欄位排序)
    
    //回傳 以User物件型態fetch(搜尋到的使用者資訊) 
    return '';
}
/** < ====================================== HW >

/** < HW ====================================== >
/**
 * 新增使用者
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的使用者資料
 * @return boolean       執行結果
 */
function createUser($conn, $data = [])
{
    //prepare(以 $data[] 傳入的資料新建使用者)
    
    //創建完整要匯入資料庫的使用者資料陣列
    $addUserData = [
        'role'       => $data['role'] ?? 'C',
        'account'    => $data[''],
        'password'   => $data[''],
        'name'       => $data[''],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
    ];
    //回傳 新建資料的結果(true or false)
    return '';
}
/** < ====================================== HW >

// =============================================================================
// = Stickers
// =============================================================================

/**
 * 取得所有貼圖
 * 
 * @param  PDO $conn    PDO實體
 * @return array
 */
function fetchAllStickers($conn)
{
    $stmt = $conn->prepare('SELECT * FROM `stickers`');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Stickers');
}
