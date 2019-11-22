<?php

require __DIR__ . '/etc/bootstrap.php';

//獲取登入資訊 未登入$user則為空值
$user = findUserById($conn, $id = $_SESSION["userId"] ?? "");
//如有登入資訊 獲取登入使用者 ID/帳號/名稱/身份
$userId    = $user["id"] ?? "";
$account   = $user['account'] ?? "";
$seat      = $user['seat'] ?? "";
$credit = $user['credit'] ?? "";
$purchase_list = $user['purchase_list'] ?? [];

//未登入則跳回登入頁面
if (!$user) 
{
    header("Location:login.php");
    die;
}

//獲取所有貼圖清單
$stickers = fetchAllStickers($conn);

//使用者已購買的貼圖清單
$wish_list = userWishList($conn, $userId);
//創建使用者願望清單內的貼圖列表
$wishedStickers = array_map(function($wishedStickerId){
    global $conn;
    return findStickerById($conn, $wishedStickerId);
},$wish_list);

?>

<html>

<?php include("header.php") ?>

<body class="page__wishbox">
    <div class="wrapper">

        <header class="header">
            <h1 class="header__logo">
                <a href="stickerPage.php"><span>WEB</span>STORE</a>
            </h1>
            <div class="header__search" data-widget="SearchBox">
                <form action="stickerPage.php" method="GET">
                    <span class="header__search_block header__search_block--filter">
                        <i class="material-icons icon-filter">filter_list</i>
                        <select class="search__filter_select" name="field">
                            <option value="author">作者</option>
                        </select>
                    </span>
                    <span class="header__search_block">
                        <input class="search__submit_input" type="submit" value="">
                        <i class="material-icons icon-search">search</i>
                        </input>
                    </span>
                    <input class="header__search_input" type="text" name="search" placeholder="搜尋貼圖" value="">
                </form>
            </div>
            <ul class="header__util">
                <?php if ($account) { ?>
                    <li class="header__util_item wish-box">
                        <a><span>使用機台，<?= $seat ?></span></a>
                        <span class="util__item_line">|</span>
                    </li>
                <?php } ?>
                <li class="header__util_item wish-box">
                    <a href="#">
                        <span class="util__item_icon">
                            <i class="material-icons icon-wish">favorite_border</i>
                        </span>
                        <span>願望清單</span>
                    </a>
                    <span class="util__item_line">|</span>
                </li>
                <?php if ($account) { ?>
                    <li class="header__util_item login-button">
                        <a href="controllers/logout_process.php">登出</a>
                    </li>
                <?php } else { ?>
                    <li class="header__util_item login-button">
                        <a href="login.php">登入</a>
                    </li>
                <?php } ?>
            </ul>
        </header>

        <div class="content">
            <div class="sidebar">
                <nav class="sidebar__nav" role="navigation">
                    <h2 class="sidebar__title">貼圖選單</h2>
                    <ul class="sidebar__list">
                        <?php foreach ($stickers as $sticker) { ?>
                            <li class="sidebar__list_item">
                                <a href="stickerPage.php?sticker=<?= $sticker->id ?>">
                                    <?= $sticker->title ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="main">
                <section class="main__section">
                    <div class="main__section--wishbox">
                        <h2 class="section__text--hide">願望清單</h2>
                        <nav class="section__tab">
                            <ul class="section__tab_list">
                                <li class="tab__list_item selected">
                                    <a href="wishboxPage.php">願望清單</a>
                                </li>
                                <li class="tab__list_item">
                                    <a href="userStickerPage.php">我的貼圖</a>
                                </li>
                            </ul>
                        </nav>

                        <div class="section__wishbox section__wishbox_list--empty">
                            <?php if(!$wish_list) {?>
                            <p class="section__wishbox_text">
                                願望清單中沒有任何項目。
                                到LINE STORE搜尋貼圖或主題，在喜歡的項目中點選<em>♡按鍵</em>，加到願望清單中吧！
                            </p>
                            <?php } else { ?>
                            <ul class="section__wishbox_list">
                            <?php foreach ($wishedStickers as $wishedSticker) { ?>
                            <li class="wishbox__list_item">
                                <a href="stickerPage.php?sticker=<?= $wishedSticker['id'] ?>" class="list__item_link">
                                    <div class="list__item_img">
                                        <img src="./img/sticker-<?= $wishedSticker['id'] ?>/index.png" >                                        
                                    </div>
                                    <div class="list__item_info">
                                        <p class="list__info_name"><?= $wishedSticker['author'] ?></p>
                                        <h3 class="list__info_title"><?= $wishedSticker['title'] ?></h3>
                                        <p class="list__info_price">
                                            <span class="list__info_priceText">NT$<?= $wishedSticker['price'] ?></span>
                                        </p>
                                    </div>
                                </a>
                                <div class="list__item_btn">
                                    <form action="controllers/wish_process.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $userId ?>">
                                        <input type="hidden" name="stickerId" value="<?= $wishedSticker['id'] ?>">

                                        <input type="submit" class="btn button--removed" value="取消收藏">
                                    </form>
                                    <?php if(in_array($wishedSticker['id'] , $purchasedList)) { ?>
                                        <button class="btn button--purchased">已購買</button>
                                    <?php } else {?>
                                    <form action="controllers/purchase_process.php" method="post">
                                        <input type="hidden" name="userId" value="<?= $userId ?>">
                                        <input type="hidden" name="stickerId" value="<?= $wishedSticker['id'] ?>">
                                        <input type="submit" class="btn button--purchase" value="購買">
                                    </form>
                                    <?php }?>
                                </div>
                            </li>
                            <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="main__section--other">
                        <div class="section__info">
                            <div class="section__info_edit">
                                <div class="info__edit_profile">
                                    <span class="profile__img--shadow"></span>
                                    <img src="img/profile.jpg" width="100">
                                </div>
                                <h2 class="info__edit_id"><?= $account ?></h2>
                            </div>
                            <div class="section__info_cash">
                                <h3 class="info__cash_title">我的WEB點數</h3>
                                <div class="info__cash_credit">
                                    <p class="cash__credit_price">NT$<?= $credit ?></p>
                                    <p class="cash__credit_text">(WEB點數＝目前作業成績/10)</p>
                                </div>
                            </div>
                            <a class="section__info_btn">
                                <span class="info__btn_inner">
                                    <span class="info__btn_text user-credit">儲值點數</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
    <script>
    $(document).ready(function() {

        $('.user-credit').click(function() {
            $('.user-credit').text("再不做作業啊");
        });
    });
    </script>
</body>

</html>