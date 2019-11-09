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

/**
 * 依照給予的帳號，取得使用者
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $account 要搜尋的使用者帳號
 * @return array
 */
function findUserByAccount($conn, $account)
{
    $stmt = $conn->prepare('SELECT * FROM `users` WHERE `account`=:account');
    $stmt->execute(['account' => $account]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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
    $stmt = $conn->prepare(
        "SELECT * FROM `users` WHERE `{$field}` LIKE :search ORDER BY `{$sort}` ASC"
    );
    $stmt->execute(['search' => "%{$search}%"]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Users');
}

/**
 * 新增使用者
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的使用者資料
 * @return boolean       執行結果
 */
function createUser($conn, $data = [])
{
    $stmt = $conn->prepare(
        'INSERT INTO `users` (`role`, `account`, `password`, `name`, `created_at`, `updated_at`) VALUES (:role, :account, :password, :name, :created_at, :updated_at)'
    );
    
    return $stmt->execute([
        'role'       => $data['role'] ?? 'C',
        'account'    => $data['account'],
        'password'   => $data['password'],
        'name'       => $data['name'],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
        'updated_at' => $data['updated_at'] ?? '',
    ]);
}

/**
 * 修改使用者資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要修改的使用者編號
 * @param  array $data   要修改的使用者資料
 * @return boolean       執行結果
 */
function updateUser($conn, $id, $data = [])
{    
    $stmt = $conn->prepare(
        "UPDATE `users` SET `account`=:account, `password`=:password, `name`=:name, `updated_at`=:updated_at WHERE `id`={$id}"
    );
    
    return $stmt->execute([
        'account'    => $data['account'],
        'password'   => $data['password'],
        'name'       => $data['name'],
        'updated_at' => $data['updated_at'] ?? date('Y-m-d H:i:s'),
    ]);
}

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
