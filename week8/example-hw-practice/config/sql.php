<?php

$queryAllStickers  = "SELECT * FROM stickers";
/*HW--> 完成讀取User資料表語法 */
$queryAllUser = "SELECT * FROM users"; 
$insertUser = "INSERT INTO users (account, password, name, created_at) VALUES (:account, :password, :name, :created_at) ";

function fetchClass($conn, $sql, $class)
{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
}

function insertAccount($conn, $sql, $post)
{
    try {
        $uAccount = $post["account"] ?? "";
        $uPassword = $post["password"] ?? "";
        $uName = $post["name"] ?? "";

        $stmt = $conn->prepare($sql);
            
        $stmt->execute([
            'account' => $uAccount,
            'password' => $uPassword,
            'name' => $uName,
            'created_at' => date('Y-m-d'),
        ]);
        $conn = null;
        return '1';
    } catch (Exception $e) {

        return '0';
    }
}
