<?php

require __DIR__ . '/etc/bootstrap.php';

//獲取所有貼圖清單
$stickers = fetchAllStickers($conn);

$list = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

//獲取當前選取貼圖編號 及設定預設值
$stickerId = $_GET["sticker"] ?? "1";
$selectedSticker = $stickers[($stickerId - 1)];

//獲取登入資訊 帳號/名稱/身份:預設'顧客'
$account = $_SESSION["account"] ?? "";
$name = $_SESSION["name"] ?? "";
$authority = $_SESSION["authority"] ?? "C";

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
                <form action="stickerPage.php" method="POST">
                    <span class="header__search_block header__search_block--filter">
                        <i class="material-icons icon-filter">filter_list</i>
                        <select class="search__filter_select" name="search-field">
                            <option value="author">作者</option>
                            <option value="title">名稱</option>
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
                        <a><span>你好，<?= $name ?></span></a>
                        <span class="util__item_line">|</span>
                    </li>
                <?php } ?>
                <?php if ($authority == 'M') { ?>
                    <li class="header__util_item">
                        <a href="usersTable.php">
                            <span>管理註冊清單</span>
                        </a>
                        <span class="util__item_line">|</span>
                    </li>
                <?php } else { ?>
                    <li class="header__util_item wish-box">
                        <a href="#">
                            <span class="util__item_icon">
                                <i class="material-icons icon-wish">favorite_border</i>
                            </span>
                            <span>願望清單</span>
                        </a>
                        <span class="util__item_line">|</span>
                    </li>
                <?php } ?>
                <?php if ($account) { ?>
                    <li class="header__util_item login-button">
                        <a href="logout_process.php">登出</a>
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
                            <li class="sidebar__list_item <?php echo ($sticker->id == $stickerId) ? "selected" : "" ?>">
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
                                    <a href="#">願望清單</a>
                                </li>
                                <li class="tab__list_item">
                                    <a>我的貼圖</a>
                                </li>
                            </ul>
                        </nav>

                        <div class="section__wishbox section__wishbox_list--empty">
                            <?php if($account) {?>
                            <p class="section__wishbox_text">
                                願望清單中沒有任何項目。
                                到LINE STORE搜尋貼圖或主題，在喜歡的項目中點選<em>♡按鍵</em>，加到願望清單中吧！
                            </p>
                            <?php } ?>
                            <ul class="section__wishbox_list">
                                <li class="wishbox__list_item">
                                    <a class="list__item_close FnDeleteBtn" href="javascript:;">
                                        <span class="MdBtnClose01"></span>
                                    </a>
                                    <a href="/stickershop/product/15622/zh-Hant" class="list__item_link">
                                        <div class="list__item_img">
                                            <img src="https://stickershop.line-scdn.net/stickershop/v1/product/15622/LINEStorePC/thumbnail_shop.png;compress=true">                                        
                                        </div>
                                        <div class="list__item_info">
                                            <p class="list__info_name">謙謙創藝</p>
                                            <h3 class="list__info_title">好想兔-小小淘氣</h3>
                                            <p class="list__info_price">
                                                <span class="list__info_priceText">NT$60</span>
                                            </p>
                                        </div>
                                    </a>
                                    <div class="list__item_btn">
                                        <a class="btn remove__btn">
                                            <span class="btn__inner">
                                                <span class="btn__text">
                                                    取消收藏
                                                </span>
                                            </span>
                                        </a>
                                        <a class="btn submit__btn">
                                            <span class="btn__inner">
                                                <span class="btn__text">購買</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main__section--other">
                        <div class="section__info">
                            <div class="section__info_edit">
                                <div class="info__edit_profile">
                                    <span class="profile__img--shadow"></span>
                                    <img src="https://profile.line-scdn.net/0hzOV0cbKyJWBrSQ479BxaN1cMKw0cZyMoEyY6UUcbLFNHeWEzXitsUxkeflETfjBkUSdtBE1ILgUW/large" width="100">
                                </div>
                                <h2 class="info__edit_id">Tiny踢妮✌</h2>
                            </div>
                            <div class="section__info_cash">
                                <h3 class="info__cash_title">我的WEB點數</h3>
                                <div class="info__cash_credit">
                                    <p class="cash__credit_price">NT$0</p>
                                    <p class="cash__credit_text">(WEB點數＝目前作業成績/10)</p>
                                </div>
                            </div>
                            <a class="section__info_btn">
                                <span class="info__btn_inner">
                                    <span class="info__btn_text">儲值點數</span>
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

            let clickSticker = false;
            $('.sticker__li').click(function() {
                clickSticker = true;
                console.log(clickSticker);

                $('.sticker__imgPreview').addClass('nonDisp');
                $(this).find('.sticker__imgPreview').toggleClass('nonDisp');
                if ($(this).find('.sticker__imgPreview').hasClass('nonDisp')) {
                    $('.sticker__li_inner').css("opacity", "1");
                    $(this).find('.sticker__li_inner').css("opacity", "1");
                } else {
                    $('.sticker__li_inner').css("opacity", "0.5");
                    $(this).find('.sticker__li_inner').css("opacity", "0");
                }
            });
            $('.main').click(function() {
                if (!clickSticker) {
                    console.log(clickSticker);
                    $('.sticker__imgPreview').addClass('nonDisp');
                    $('.sticker__li_inner').css("opacity", "1");
                    $(this).find('.sticker__li_inner').css("opacity", "1");
                }
                clickSticker = false;
            });
        });
    </script>
</body>

</html>