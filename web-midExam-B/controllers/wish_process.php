<?php

require __DIR__ . '/../etc/bootstrap.php';

//確認是否有修改表單資料

if (!empty($_POST)) {

    

    // =============================================================================
    // = 處理送來的表單資料
    // =============================================================================

    $userId = $_POST["userId"] ?? "";
    $stickerId = $_POST["stickerId"] ?? "";

    //沒有登入資訊跳轉登入頁
    if(!$userId){
        header("Location:../login.php");
        die;
    }
    
    //使用者已購買的貼圖清單
    $wishedSticker = checkWish($conn, $userId, $stickerId);
    $wishedId = $wishedSticker['id'];
    $wishedDeleted = $wishedSticker['deleted_at'];

    /* =============================================================================
     * = 修改願望清單
     * =============================================================================
    **/
    if($wishedSticker)
    {
        if($wishedDeleted)
        {
            $wishResult = readdWish($conn, $wishedId);
        }
        else
        {
            $wishResult = removeWish($conn, $wishedId);
        }
    }
    else
    {
        $wishResult = addWish($conn, [
            "user_id" => $userId,
            "sticker_id" => $stickerId,
        ]);
    }

    header("Location:../stickerPage.php?sticker=$stickerId");
    die;
}

header("Location:../stickerPage.php");
