<?php

//學號： 姓名： 機台：

// =============================================================================
// = Users
// =============================================================================

/**
 * 修改使用者資料
 * 
 * @param  PDO $conn         PDO實體
 * @param  string $account   要修改的使用者帳號
 * @param  array $seat       要修改的使用者機台
 * @return boolean           執行結果
 */
function updateUserSeat($conn, $account, $seat)
{    
    $stmt = $conn->prepare(
        "UPDATE `users` SET `seat`=:seat, `updated_at`=CURRENT_TIME() WHERE `account`={$account}"
    );
    
    return $stmt->execute(["seat" => $seat]);

}

// =============================================================================
// = Stickers
// =============================================================================


/**
 * 依照給予的作者關鍵字，取得符合的貼圖
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $search  要搜尋的貼圖作者關鍵字
 * @return object
 */
function findStickerLikeSearch($conn, $search)
{
    $stmt = $conn->prepare("SELECT * FROM `stickers` WHERE `author` LIKE :search");
    $stmt->execute(['search' => "%{$search}%"]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Stickers');
}

// =============================================================================
// = Wishes
// =============================================================================

/**
 * 新增願望清單
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的願望清單資料
 * @return boolean       執行結果
 */
function addWish($conn, $data = [])
{
    $stmt = $conn->prepare(
        'INSERT INTO `wishes` (`user_id`, `sticker_id`, created_at) VALUES (:user_id, :sticker_id, :created_at)'
    );
    
    return $stmt->execute([
        'user_id'       => $data['user_id'],
        'sticker_id'    => $data['sticker_id'],
        'created_at' => $data['created_at'] ?? date('Y-m-d H:i:s'),
    ]);
}

/**
 * 依使用者id回傳願望清單
 * 
 * @param  PDO $conn         PDO實體
 * @param  string $user_id   要搜尋購買記錄的使用者id
 * @return array
 */
function userWishList($conn, $user_id)
{
    $sql = "SELECT * FROM `wishes` WHERE `user_id` = '$user_id' AND `deleted_at` IS NULL";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $recordList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //讀取每筆願望清單內貼圖id 創建願望貼圖id清單
    $userWish = [];
    foreach( $recordList as $record )
    {
        $userWish[] = $record['sticker_id'];
    }
    /*
    $userWish = array_map(function ($record){
        return $record['sticker_id'];
    },$recordList);
    */

    return $userWish;
}