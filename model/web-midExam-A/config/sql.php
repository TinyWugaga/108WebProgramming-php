<?php

require __DIR__ . '/../models/users.php';
require __DIR__ . '/../models/stickers.php';
require __DIR__ . '/../models/purchases.php';

// =============================================================================
// = Users
// =============================================================================

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
 * 依照給予的ID，取得使用者
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $id      要搜尋的使用者ID
 * @return array
 */
function findUserById($conn, $id)
{
    $stmt = $conn->prepare('SELECT * FROM `users` WHERE `id`=:id');
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {//轉換願望清單json格式
        $user['wish_list'] = json_decode($user['wish_list'],JSON_UNESCAPED_UNICODE);
        $user['purchase_list'] = json_decode($user['purchase_list'],JSON_UNESCAPED_UNICODE);
    }
    return $user;
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
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user) {//轉換願望清單json格式
        $user['wish_list'] = json_decode($user['wish_list'],JSON_UNESCAPED_UNICODE);
        $user['purchase_list'] = json_decode($user['purchase_list'],JSON_UNESCAPED_UNICODE);
    }

    return $user;
}

/**
 * 更新使用者願望清單資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要更新清單的使用者編號
 * @param  array $data   更新後的願望清單資料
 * @return boolean       執行結果
 */
function updateWishList($conn, $id, $list = [])
{    
    $wish_list = json_encode($list,JSON_UNESCAPED_UNICODE);

    $stmt = $conn->prepare(
        "UPDATE `users` SET `wish_list`=:wish_list, `updated_at`=CURRENT_TIME() WHERE `id`={$id}"
    );
    
    return $stmt->execute(['wish_list' => $wish_list]);

}

// =============================================================================
// = Stickers
// =============================================================================

/**
 * 取得所有貼圖
 * 
 * @param  PDO $conn    PDO實體
 * @return object
 */
function fetchAllStickers($conn)
{
    $stmt = $conn->prepare('SELECT * FROM `stickers`');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Stickers');
}

/**
 * 依照給予的id獲取貼圖資訊
 * 
 * @param  PDO $conn    PDO實體
 * @param  string $id   要搜尋的貼圖ID
 * 
 * @return array
 */
function findStickerById($conn, $id)
{
    $stmt = $conn->prepare('SELECT * FROM `stickers` WHERE `id`=:id');
    $stmt->execute([ 'id' => $id ]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}