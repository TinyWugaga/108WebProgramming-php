<?php

$servername = "localhost";
$dbname = "web_class";
$username = "web_class";
$password = '$2y$10$Ohdd6Pt.nmYAJMgzDWl38.ZdQ';

try {
    $conn = new PDO(
    "mysql:host=$servername;dbname=$dbname;",
    $username,
    $password
);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "資料庫連接失敗：{$e->getMessage()}";
    die;
}
