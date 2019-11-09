<?php
  require 'job.php';
  require 'db.php';

  $sql="select * from job";
  $sth = $conn->prepare($sql);
  $sth->execute();
  $rows = $sth->fetchAll(PDO::FETCH_CLASS, 'Job');
?>

<table width="85%" align=center>
 <tr align=center>
  <td>求才廠商</td>
  <td>求才內容</td>
  <td>日期</td>
 </tr>
 <?php
 foreach($rows as $job){ ?>
 <tr align=center>
  <td><?=$job->company?></td>
  <td><?=$job->content?></td>
  <td><?=$job->pdate?></td>
 </tr>
 <?php
  }
  $conn = null; 
  ?>
</table>