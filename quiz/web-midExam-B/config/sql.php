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
 * 更新使用者購買記錄資料
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要更新清單的使用者編號
 * @param  array $data   更新後的購買記錄資料
 * @return boolean       執行結果
 */
function updatePurchaseList($conn, $id, $list = [])
{    
    $purchase_list = json_encode($list,JSON_UNESCAPED_UNICODE);

    $stmt = $conn->prepare(
        "UPDATE `users` SET `purchase_list`=:purchase_list, `updated_at`=CURRENT_TIME() WHERE `id`={$id}"
    );
    
    return $stmt->execute(['purchase_list' => $purchase_list]);

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

// =============================================================================
// = Wishes
// =============================================================================

/**
 * 查詢願望清單是否存在 並回傳id
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要查詢的購買記錄
 * @return array       執行結果
 */
function checkWish($conn, $user_id, $sticker_id)
{
    $stmt = $conn->prepare(
        "SELECT * FROM `wishes` WHERE `user_id`={$user_id} AND `sticker_id`={$sticker_id}"
    );
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * 移除願望清單
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id   要移除的購買記錄
 * @return boolean       執行結果
 */
function removeWish($conn, $id)
{
    $stmt = $conn->prepare(
        "UPDATE `wishes` SET `deleted_at`= CURRENT_TIME() WHERE `id`={$id}"
    );
    
    return $stmt->execute();
}

/**
 * 重新收藏願望清單
 * 
 * @param  PDO $conn     PDO實體
 * @param  string $id    要重新收藏的購買記錄
 * @return boolean       執行結果
 */
function readdWish($conn, $id)
{
    $stmt = $conn->prepare(
        "UPDATE `wishes` SET `deleted_at`= NULL WHERE `id`={$id}"
    );
    
    return $stmt->execute();
}