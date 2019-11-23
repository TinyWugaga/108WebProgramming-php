<?php

/**
 * 請填寫自己的學號/姓名/使用機台
 * 學號： 姓名： 機台：
 */

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
function updateUserName($conn, $account, $seat)
{    
    //$sql= 更新 `users`資料表 `seat`=使用者機台 `updated_at`=CURRENT_TIME() 欄位 在 `account` = 使用者帳號 的條件下
    //prepare($sql);

    //execute([綁定:seat]);
    
    //回傳執行結果
    return null;

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
    //$sql= 讀取 全部欄位 `stickers`資料表 `author`欄位 部分符合 $search關鍵字 的資料
    //prepare($sql);

    //execute([綁定:search]);
    
    //回傳 fetchAll -> 'Stickers' 物件型態資料

    return null;
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
    //$sql= 新建 `wishes`資料表 (`user_id`, `sticker_id`, `created_at`)欄位 為$data 資料的願望清單
    //prepare($sql);

    $wishData = [
        'user_id'       => $data[''], /**完成資料綁定 */
        'sticker_id'    => $data[''], /**完成資料綁定 */
        'created_at' => $data['created_at'] ?? date('Y-m-d H:i:s'),
    ];

    //execute([綁定:user_id :sticker_id :created_at]);
    
    //回傳執行結果
    return null;
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
    //$sql= 讀取 全部欄位 `wishes`資料表 `user_id`欄位 等於 使用者id 且 deleted_at` IS NULL 的資料
    //prepare($sql);

    //execute([綁定:user_id]);

    $recordList = [];/**存取回傳資料 fetchAll -> 陣列型態資料 */

    /**以下勿動 */
    //讀取每筆願望清單內貼圖id 創建願望貼圖id清單
    $userWish = [];
    foreach( $recordList as $record )
    {
        $userWish[] = $record['sticker_id'];
    }

    return $userWish;
}