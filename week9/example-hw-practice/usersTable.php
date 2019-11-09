<?php

require __DIR__ . '/etc/bootstrap.php';

//非管理者則跳回貼圖商店
if(''/*HW--> 完成驗證登入身份別是否為管理者 */){
    header("Location:stickerPage.php");
    die;
}

//獲取管理者名稱
$name = $_SESSION["name"] ?? "";

//獲取排序及搜尋條件
$sort = $_GET["sort"] ?? "id";
$search = $_GET["search"] ?? "";
$field = $_GET["field"] ?? "account";

//獲取使用者清單欄位名稱 及使用者清單
$usersTitle = fetchAllUsersField($conn);
$usersList  = findUserLikeSearch($conn ,$search, $field, $sort);

?>

<html>

<?php include("header.php") ?>

<body class="page__userTable">
    <div class="wrapper">

        <header class="header">
            <h1 class="header__logo">
                <a href="stickerPage.php"><span>WEB</span>STORE</a>
            </h1>
            <div class="header__search" data-widget="SearchBox">
                <form action="usersTable.php" method="GET">
                    <span class="header__search_block header__search_block--filter">
                        <i class="material-icons icon-filter">filter_list</i>
                        <select class="search__filter_select" name="field">
                            <option value="account">帳號</option>
                            <option value="name">名稱</option>
                        </select>
                    </span>
                    <span class="header__search_block">
                        <input class="search__submit_input" type="submit" value="">
                            <i class="material-icons icon-search">search</i>
                        </input>
                    </span>
                    <input class="header__search_input" type="text" name="search" placeholder="搜尋使用者" value=<?= $search?>>
                </form>
            </div>
            <ul class="header__util">
                <li class="header__util_item wish-box">
                    <a><span>你好，<?= $name ?></span></a>
                    <span class="util__item_line">|</span>
                </li>
                <li class="header__util_item">
                    <a href="stickerPage.php">
                        <span>返回貼圖商店</span>
                    </a>
                    <span class="util__item_line">|</span>
                </li>
                <li class="header__util_item login-button">
                    <a href="logout_process.php">登出</a>
                </li>
            </ul>
        </header>

        <div class="content">

            <div class="class__paper">
                <table class="class__table">
                    <thead class="class__table_head">
                        <tr class="class__table_row">
                            <?php foreach ($usersTitle as $title) { ?>
                            <th class="class__table_cell class__table_cell--head">
                                <a class="icon table__cell_button" href="usersTable.php?sort=<?= $title ?>&search=<?= $search?>&field=<?=$field?>">
                                    <?= $title ?>
                                    <i class="material-icons">expand_more</i>
                                </a>
                            </th>
                            <?php } ?>
                            <th class="class__table_cell class__table_cell--head table__cell--icon">EDIT</th>
                            <th class="class__table_cell class__table_cell--head table__cell--icon">DELETE</th>
                        </tr>
                    </thead>

                    <tbody class="class__table_content">
                    <?php foreach ($usersList as $user) { ?>
                        <tr class="class__table_row class__table_row--body">
                        <?php foreach ($usersTitle as $title) { ?>
                            <td class="class__table_cell class__table_cell--body">
                                <?= $user->$title ?>
                            </td>
                        <?php } ?>
                            <td class="class__table_cell class__table_cell--body table__cell--icon">
                                <form class="class__table_form">
                                    <input type="button">
                                        <i class="material-icons">edit</i>
                                    </input>
                                </form>
                            </td>
                            <td class="class__table_cell class__table_cell--body table__cell--icon">
                                <form class="class__table_form">
                                    <input type="button">
                                        <i class="material-icons icon-delete">delete</i>
                                    </input>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>