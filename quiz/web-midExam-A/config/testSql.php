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
 * @param  array $name       要修改的使用者姓名
 * @return boolean           執行結果
 */
function updateUserName($conn, $account, $name)
{    
    //$sql= 更新 `users`資料表 `name`=使用者姓名 `updated_at`=CURRENT_TIME() 欄位 在 `account` = 使用者帳號 的條件下
    //prepare($sql);

    //execute([綁定:name]);
    
    //回傳執行結果
    return null;

}

// =============================================================================
// = Stickers
// =============================================================================


/**
 * 依照給予的名稱關鍵字，取得符合的貼圖
 * 
 * @param  PDO $conn       PDO實體
 * @param  string $search  要搜尋的貼圖名稱關鍵字
 * @return object
 */
function findStickerLikeSearch($conn, $search)
{
    //$sql= 讀取 全部欄位 `stickers`資料表 `title`欄位 部分符合 $search關鍵字 的資料
    //prepare($sql);

    //execute([綁定:search]);
    
    //回傳 fetchAll -> 'Stickers' 物件型態資料

    return null;
}

// =============================================================================
// = Purchases
// =============================================================================

/**
 * 新增購買紀錄
 * 
 * @param  PDO $conn     PDO實體
 * @param  array $data   要新增的購買記錄資料
 * @return boolean       執行結果
 */
function addPurchase($conn, $data = [])
{
    //$sql= 新建 `purchases`資料表 (`user_id`, `sticker_id`, `created_at`)欄位 為$data 資料的購買記錄
    //prepare($sql);

    $purchaseData = [
        'user_id'       => $data[''], /**完成資料綁定 */
        'sticker_id'    => $data[''], /**完成資料綁定 */
        'created_at' => $data['created_at'] ?? date('Y-m-d H:i:s'),
    ];

    //execute([綁定:user_id :sticker_id :created_at]);
    
    //回傳執行結果
    return null;
}

/**
 * 依使用者id回傳已購買的貼圖清單
 * 
 * @param  PDO $conn         PDO實體
 * @param  string $user_id   要搜尋購買記錄的使用者id
 * @return array
 */
function userPurchasedList($conn, $user_id)
{
    //$sql= 讀取 全部欄位 `purchases`資料表 `user_id`欄位 等於 使用者id 的資料
    //prepare($sql);

    //execute([綁定:user_id]);

    $recordList = [];/**存取回傳資料 fetchAll -> 陣列型態資料 */

    /**以下勿動 */
    //轉換購買記錄為貼圖id清單
    $userPurchase = array_map(function ($record){
        return $record['sticker_id'];
    },$recordList);

    return $userPurchase;
}