<?php
require 'job.php';
require 'db.php';

$sql = "select * from job";
$sth = $conn->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_CLASS, 'Job');

//table title
$jobTableTitle = ["company" => "求才廠商", "content" => "求才內容", "pdate" => "日期"]

?>

<html>

<?php require("header.php") ?>

<body class="page__class">
  <div class="wrapper">
    <div class="page__class_table">

      <h3 class="class__table_title">
        DATABASE TABLE
        <a class="icon class__table_icon--right" href="logout_process.php"">
          <i class=" material-icons icon_delete">account_circle</i>
          LOGOUT
        </a>
      </h3>

      <table class="table">
        <thead class="table__head">
          <tr class="table__head_row table__row">

            <?php foreach ($jobTableTitle as $titleName => $tableTitle) { ?>
              <th class="table__head_cell table__cell table__cell--<?= $titleName ?>">
                <?= $tableTitle ?>
              </th>
            <?php } ?>

          </tr>
        </thead>
        <tbody class="table__content">
          <?php foreach ($rows as $job) { ?>
            <tr class="table__row">
              <?php foreach ($jobTableTitle as $titleName => $tableTitle) { ?>
                <td class="table__cell table__cell--<?= $titleName ?>">
                  <?= $job->$titleName ?>
                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>