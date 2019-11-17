<?php

require __DIR__ . '/etc/bootstrap.php';

//確認是否有修改表單資料
if (!empty($_POST)) {

    // =============================================================================
    // = 處理送來的表單資料
    // =============================================================================

    $userId = $_POST["userId"] ?? "";
    $stickerId = $_POST["stickerId"] ?? "";

    $user = findUserById($conn, $userId);
    $wish_list = $user['wish_list'] ? :[];
    
    /* =============================================================================
     * = 修改使用者資料
     * =============================================================================
    **/

    if(in_array($stickerId,$wish_list))
    {
       
        $removedIndex = array_keys($wish_list, $stickerId)[0];

        $wishList = array_merge(
            array_slice($wish_list, 0, $removedIndex),
            array_slice($wish_list, $removedIndex+1)
        );
    }
    else
    {
        $wishList = array_merge($wish_list, [$stickerId]);
    }
   
    
    $updateResult = updateWishList($conn, $userId, $wishList);

    header("Location:stickerPage.php?sticker=$stickerId");
    die();
}

header("Location:stickerPage.php");
