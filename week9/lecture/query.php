<?php

require 'db.php';
require 'job.php';


$searchtxt = $_POST["searchtxt"] ?? "";//獲取搜尋關鍵字
// 等同於 == $searchtxt = isset($_POST["searchtxt"]) ? $_POST["searchtxt"] : "";

if (!$searchtxt)//如果沒有搜尋條件則印出所有內容
{
  $sql = "select * from job";
  $stmt = $conn->prepare($sql);
}
else
{
  //搜尋 company欄位 = 搜尋關鍵字，WHERE需要完全符合才成立
  //$sql="select * from job where company = :searchtxt";

  //搜尋 company欄位 = 搜尋關鍵字，LIKE只需部分符合即可成立
  $sql = "select * from job where company like :searchtxt";
  $stmt = $conn->prepare($sql);
  //使用 LIKE搜尋字樣需要再字串開頭集結尾加上%，e.g:'%關鍵字%'
  $stmt->bindValue(':searchtxt', "%" . $searchtxt . "%");
}

$stmt->execute();

//$rows = $stmt->fetchAll(PDO::FETCH_CLASS, 'Job'); //將搜尋結果建立物件讀取
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //將搜尋結果建立陣列讀取

?>

<a href="insert.html">新增求才資訊</a>
<form action="query.php" method="post">
  <p style='text-align:center'>
    <input type=text name="searchtxt" value="<?=$searchtxt?>">
    <input type=submit value="搜尋廠商"></p>
</form>

<table width='85%' style='float:right'>
  <tr style='text-align:center'>
    <td>求才廠商</td>
    <td>求才內容</td>
  </tr>
  <?php
  foreach ($rows as $job) { ?>

    <tr style='text-align:center'>
      <td><?= $job["company"] ?></td>
      <td><?= $job["content"] ?></td>
    </tr>
  <?php }
  
  ?>
</table>