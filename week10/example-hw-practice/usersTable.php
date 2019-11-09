<?php

require __DIR__ . '/etc/bootstrap.php';

//非管理者則跳回貼圖商店
if (!isset($_SESSION["authority"])) {
    header("Location:stickerPage.php");
    die;
}

//獲取管理者名稱
$name = $_SESSION["name"] ?? "";

//檢查是否有排序及搜尋條件 
$sort = $_GET["sort"] ?? "id";
$search = $_GET["search"] ?? "";
$field = $_GET["field"] ?? "account";

//獲取使用者清單欄位名稱 及使用者清單
$usersTitle = fetchAllUsersField($conn);
$usersList = findUserLikeSearch($conn, $search, $field, $sort);

$edit = $_GET["edit"] ?? '0' ;
$result = isset($_GET["result"]) ? $_GET["result"] ? '修改資料成功':'修改資料失敗' : '';

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
                    <input class="header__search_input" type="text" name="search" placeholder="搜尋使用者" value=<?= $search ?>>
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
            <!-- EDIT BOARD -->
            <?php if(isset($_GET["edit"])) { ?>
            <div class="class__edit">
                <div class="class__board">
                    <div class="class__board_inner">
                        <div class="class__board_logo">
                            <h1 class="class__board_title">Edit</h1>
                        </div>
    
                        <p class="class__board_notice"> <?= $result ?></p>
    
                        <div class="class__board_block">
                            <form class="class__form" name="updateForm" action="edit_process.php" method="post">
                                <input type="hidden" name="id" value=<?= $usersList[$edit]->id ?> >
                                <div class="class__form_textField">
                                    <label class="form__textField_label">帳號</label>
                                    <input type="text" name="account" placeholder="修改帳號" value=<?= $usersList[$edit]->account ?> required autocapitalize="off" autocorrect="off" spellcheck="false">
                                </div>
                                <div class="class__form_textField">
                                    <label class="form__textField_label">密碼</label>
                                    <input type="text" name="password" placeholder="修改密碼" value=<?= $usersList[$edit]->password ?> required>
                                </div>
                                <div class="class__form_textField">
                                    <label class="form__textField_label">名稱</label>
                                    <input type="text" name="name" placeholder="修改名稱" value=<?= $usersList[$edit]->name ?> required>
                                </div>
                                <div class="class__form_btn">
                                    <button type="submit" class="btn submit__btn">修改</button>
                                    <button type="button" class="btn cancel__btn">
                                        <a href="usersTable.php">取消</a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="class__paper">
                <table class="class__table">
                    <thead class="class__table_head">
                        <tr class="class__table_row">
                            <?php foreach ($usersTitle as $title) { ?>
                                <th class="class__table_cell class__table_cell--head">
                                    <a class="icon table__cell_button" href="usersTable.php?sort=<?= $title ?>&search=<?= $search ?>&field=<?= $field ?>">
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
                        <?php foreach ($usersList as $key => $user) { ?>
                            <tr class="class__table_row class__table_row--body">
                                <?php foreach ($usersTitle as $title) { ?>
                                    <td class="class__table_cell class__table_cell--body">
                                        <?= $user->$title ?>
                                    </td>
                                <?php } ?>
                                <td class="class__table_cell class__table_cell--body table__cell--icon">
                                    <a class="table__cell_button" href="usersTable.php?edit=<?= $key?>">
                                        <input type="button">
                                        <i class="material-icons">edit</i>
                                        </input>
                                    </a>
                                </td>
                                <td class="class__table_cell class__table_cell--body table__cell--icon">
                                    <a class="table__cell_button">
                                        <input type="button">
                                        <i class="material-icons icon-delete">delete</i>
                                        </input>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>