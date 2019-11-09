<?php

require __DIR__ . '/../models/users.php';
require __DIR__ . '/../models/stickers.php';

// =============================================================================
// = Users
// =============================================================================

/**
 * 取得所有使用者
 * 
 * @param  PDO $conn    PDO實體
 * @return array
 */
function fetchAllUser($conn)
{
    $stmt = $conn->prepare('SELECT * FROM `users`');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 依照給予的名稱，取得使用者
 * 
 * @param  PDO $conn    PDO實體
 * @param  string $name 要搜尋的使用者名稱
 * @return array
 */
function findUserByName($conn, $name)
{
    $stmt = $conn->prepare('SELECT * FROM `users` WHERE `name`=:name');
    $stmt->execute(['name' => $name]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
 * 新增使用者
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的使用者資料
 * @return boolean       執行結果
 */
function createUser($conn, $data = [])
{
    $stmt = $conn->prepare(
        'INSERT INTO `users` (`account`, `password`, `name`, `created_at`) VALUES (:account, :password, :name, :created_at)'
    );
    
    return $stmt->execute([
        'account'    => $data['account'],
        'password'   => $data['password'],
        'name'       => $data['name'],
        'created_at' => $data['created_at'] ?? date('Y-m-d'),
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
