<?php

require 'job.php';
require 'db.php';

//獲取要修改的postid
$postid = $_GET["postid"] ?? "";

if (!$postid)//如果沒有id則印出錯誤訊息
{

  echo "ERROR: 未指定postid!";
  die();

} 
else
{
  //讀取 想要修改的post原本的資料
  $sql = "select * from job where postid = :postid";
  $stmt = $conn->prepare($sql);
  
  //綁定:postid變數；用bindParam可以直接綁定變數 $postid
  $stmt->bindParam(':postid', $postid);
  $stmt->execute();

  //只fetch一筆資料，並以物件型態讀取
  $job = $stmt->fetchObject('Job');

}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Insert</title>
</head>

<body>

  <form method="post" action="update_process.php">
    <table width="40%">
      <caption>新增 求才公告</caption>
      <tr>
        <td>求才廠商</td>
        <td><input type=text name="company" value=<?= $job->company ?>></td>
      </tr>
      <tr>
        <td>求才內容</td>
        <td>
          <textarea name="content" cols=40 rows=10><?= $job->content ?></textarea>
        </td>
      </tr>
      <tr>
        <td>求才日期</td>
        <td><input type=date name="pdate" value=<?= $job->pdate ?>></td>
      </tr>
      <tr>
        <td colspan=2><input type="submit"></td>
      </tr>
    </table>
    <input type=hidden name="postid" value=<?= $postid ?>>
  </form>
</body>

</html>