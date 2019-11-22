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

    $user = findUserById($conn, $userId);
    $purchase_list = $user['purchase_list'] ? $user['purchase_list']:[];
    
    /* =============================================================================
     * = 修改使用者購買記錄
     * =============================================================================
    **/
   
    $purchaseList = array_merge($purchase_list, [$stickerId]);
    $updateResult = updatePurchaseList($conn, $userId, $purchaseList);

    header("Location:../stickerPage.php?sticker=$stickerId&purchase=$purchaseResult");
    die();
}

header("Location:../stickerPage.php");
