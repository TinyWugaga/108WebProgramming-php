<?php

require __DIR__ . '/../etc/bootstrap.php';

//檢查是否有排序及搜尋條件 
$sort   = $_GET["sort"] ?? "id";
$search = $_GET["search"] ?? "";
$field  = $_GET["field"] ?? "student_id";

//創建使用者清單欄位 及獲取使用者清單
$studentsTitle = [
    "id"         => "編號",
    "student_id" => "學號",
    "name"       => "名稱",
    "gender"     => "性別",
    "created_at" => "創建日期",
    "updated_at" => "更新日期",
];
$studentsList = findStudentLikeSearch($conn, $search, $field, $sort);

//獲取要是否新增使用者
$add = $_GET["add"] ?? $_POST["add"] ?? '0';

//獲取要修改的使用者資料
$editId = $_GET["edit"] ?? $_POST["edit"] ?? '0';
$editStudent = findStudentById($conn, $editId);

//獲取要刪除的使用者資料
$deleteId = $_GET["delete"] ?? $_POST["delete"] ?? '0';

//獲取process結果
$result = isset($_GET["result"]) ? $_GET["result"] ? '成功' : '失敗' : '';

?>

<html>

<?php include("header.php") ?>

<body class="page__userTable">
    <div class="wrapper">

        <header class="header">
            <h1 class="header__logo">
                <a href="stickerPage.php"><span>Todo</span>List</a>
            </h1>
            <div class="header__search" data-widget="SearchBox">
                <form action="todoList.php" method="GET">
                    <span class="header__search_block header__search_block--filter">
                        <i class="material-icons icon-filter">filter_list</i>
                        <select class="search__filter_select" name="field">
                            <option value="student_id">帳號</option>
                            <option value="name">名稱</option>
                        </select>
                    </span>
                    <span class="header__search_block">
                        <input class="search__submit_input" type="submit" value="">
                        <i class="material-icons icon-search">search</i>
                        </input>
                    </span>
                    <input class="header__search_input" type="text" name="search" placeholder="搜尋學生" value=<?= $search ?>>
                </form>
            </div>
        </header>

        <div class="content">
            <!-- EDIT BOARD -->
            <?php if ($editId) { ?>
                <div class="class__modal class__edit">
                    <div class="class__board">
                        <div class="class__board_inner">
                            <div class="class__board_logo">
                                <h1 class="class__board_title">Edit</h1>
                            </div>
                            <?php if ($result) { ?>
                                <p class="class__board_notice"> 修改資料<?= $result ?></p>
                            <?php } ?>

                            <div class="class__board_block">
                                <form class="class__form" name="updateForm" action="edit_process.php" method="post">
                                    <input type="hidden" name="id" value="<?= $editStudent['id'] ?>" >
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">學號</label>
                                        <input type="text" name="student_id" placeholder="修改學號" value="<?= $editStudent['student_id'] ?>" readonly="readonly">
                                    </div>
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">名稱</label>
                                        <input type="text" name="name" placeholder="修改名稱" value="<?= $editStudent['name'] ?>" required>
                                    </div>
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">性別</label>
                                        <select class="" name="gender" placeholder="請選擇性別" value="<?= $editStudent['gender'] ?>" required>
                                            <option <?= $editStudent['gender'] == 'M' ? "selected":"" ?> value="M">男生</option>
                                            <option <?= $editStudent['gender'] == 'F' ? "selected":"" ?> value="F">女生</option>
                                        </select>
                                    </div>
                                    <div class="class__form_btn">
                                        <button type="submit" class="btn submit__btn">修改</button>
                                        <button type="button" class="btn cancel__btn">
                                            <a href="todoList.php">取消</a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- DELETE BOARD -->
            <?php if ($deleteId) { ?>
                <div class="class__modal class__delete">
                    <div class="class__board">
                        <div class="class__board_inner">
                            <div class="class__board_logo">
                                <h1 class="class__board_title">Delete</h1>
                            </div>
                            <?php if ($result) { ?>
                                <p class="class__board_notice">刪除使用者<?= $result ?></p>
                                <div class="class__board_block">
                                    <div class="class__form_btn">
                                        <button type="button" class="btn submit__btn">
                                            <a href="todoList.php">確認</a>
                                        </button>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <p class="class__board_text">是否確定要刪除使用者？</p>
                                <div class="class__board_block">
                                    <form class="class__form" name="deleteForm" action="delete_process.php" method="post">
                                        <input type="hidden" name="id" value=<?= $deleteId ?>>
                                        <div class="class__form_btn">
                                            <button type="submit" class="btn submit__btn">確認</button>
                                            <button type="button" class="btn cancel__btn">
                                                <a href="todoList.php">取消</a>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- ADDED BOARD -->
            <?php if ($add) { ?>
                <div class="class__modal class__add">
                    <div class="class__board">
                        <div class="class__board_inner">
                            <div class="class__board_logo">
                                <h1 class="class__board_title">Add</h1>
                            </div>
                            <?php if ($result) { ?>
                                <p class="class__board_notice">新增使用者<?= $result ?></p>
                                <div class="class__board_block">
                                    <div class="class__form_btn">
                                        <button type="button" class="btn submit__btn">
                                            <a href="todoList.php">確認</a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="class__board_block">
                                <form class="class__form" name="addForm" action="add_process.php" method="post">
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">學號</label>
                                        <input type="text" name="student_id" placeholder="請輸入九位數學號" required>
                                    </div>
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">名稱</label>
                                        <input type="text" name="name" placeholder="請輸入十個字以內的名稱" required>
                                    </div>
                                    <div class="class__form_textField">
                                        <label class="form__textField_label">性別</label>
                                        <select class="" name="gender" placeholder="請選擇性別" value="M" required>
                                            <option value="M">男生</option>
                                            <option value="F">女生</option>
                                        </select>
                                    </div>
                                    <div class="class__form_btn">
                                        <button type="submit" class="btn submit__btn">新增</button>
                                        <button type="button" class="btn cancel__btn">
                                            <a href="todoList.php">取消</a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="class__table_icon">
                    <form action="todoList.php" method="post">
                        <a class="table__cell_button">
                            <input type="submit" name="add" value="1">
                                <i class="material-icons icon-add">add</i>
                            </input>
                        </a>
                        <span>新增學生</span>
                    </form>
            </div>
            <!-- Student TABLE -->
            <div class="class__paper">
                <table class="class__table">
                    <thead class="class__table_head">
                        <tr class="class__table_row">
                            <?php foreach ($studentsTitle as $field => $title) { ?>
                                <th class="class__table_cell class__table_cell--head">
                                    <a class="icon table__cell_button" href="todoList.php?sort=<?= $title ?>&search=<?= $search ?>&field=<?= $field ?>">
                                        <?= $title ?>
                                        <i class="material-icons">expand_more</i>
                                    </a>
                                </th>
                            <?php } ?>
                            <th class="class__table_cell class__table_cell--head table__cell--icon">編輯</th>
                            <th class="class__table_cell class__table_cell--head table__cell--icon">刪除</th>
                        </tr>
                    </thead>

                    <tbody class="class__table_content">
                        <?php foreach ($studentsList as $student) { ?>
                            <tr class="class__table_row class__table_row--body">
                                <?php foreach ($studentsTitle as $field => $title) { ?>
                                    <td class="class__table_cell class__table_cell--body">
                                        <?= $student->$field ?>
                                    </td>
                                <?php } ?>
                                <td class="class__table_cell class__table_cell--body table__cell--icon">
                                    <form action="todoList.php" method="post">
                                        <a class="table__cell_button">
                                            <input type="submit" name="edit" value="<?= $student->id ?>">
                                            <i class="material-icons">edit</i>
                                            </input>
                                        </a>
                                    </form>
                                </td>
                                <td class="class__table_cell class__table_cell--body table__cell--icon">
                                    <form action="todoList.php" method="post">
                                        <a class="table__cell_button">
                                            <input type="submit" name="delete" value="<?= $student->id ?>">
                                            <i class="material-icons icon-delete">delete</i>
                                            </input>
                                        </a>
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