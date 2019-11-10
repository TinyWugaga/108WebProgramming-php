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
    //prepare($sql=搜尋users資料表中 帳號 = :account的使用者)
    //綁定:account 變數

    return null;//回傳 fetch(搜尋到的使用者 以陣列型態讀取) 
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
    //$sql = 搜尋users資料表中 $field 含有 $search 關鍵字的使用者 且依 $sort 欄位排序
    $sql = "SELECT * FROM `users` WHERE `{$field}` LIKE :search ORDER BY `{$sort}` ASC";

    //prepare($sql)
    //綁定:search 變數
    
    return null;//回傳 fetchAll(搜尋到的使用者資訊 以User物件型態) 
}
/** < ====================================== HW >

/** < HW ====================================== >
 * 新增使用者
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的使用者資料
 * @return boolean       執行結果
 */
function createUser($conn, $data = [])
{
    //prepare($sql= 新增使用者到 users資料表 並使用 $data[]資料對應欄位匯入資料)
    
    //完成要新建的使用者資料陣列 ＊id為自動增加不需要輸入
    $addUserData = [
        'role'       => $data['role'] ?? 'C',
        'account'    => $data[''],
        'password'   => $data[''],
        'name'       => $data[''],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
        'updated_at' => $data['updated_at'] ?? null
    ];
    //綁定新建欄位(:role, :account, :password ,:name ,:created_at ,:updated_at) 變數

    /* PDO->execute()會回傳操作結果 */
    
    return null;//回傳 新建資料的結果(true or false)
}
/** < ====================================== HW >

/** < HW ====================================== >
 * 修改使用者資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要修改的使用者編號
 * @param  array $data   要修改的使用者資料
 * @return boolean       執行結果
 */
function updateUser($conn, $id, $data = [])
{    
    //prepare($sql= 修改 users資料表 並使用 $data[]資料對應欄位 修改 id ={$id}的使用者資料)
    
    //完成要修改的使用者資料陣列
    $updateUserData =[
        'account'    => $data[''],
        'password'   => $data[''],
        'name'       => $data[''],
        'updated_at' => $data['updated_at'] ?? date('Y-m-d H:i:s'),
    ];
    //綁定修改欄位(:account, :password ,:name ,:updated_at) 變數

    /* PDO->execute()會回傳操作結果 */
    
    return null;//回傳 新建資料的結果(true or false)
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
