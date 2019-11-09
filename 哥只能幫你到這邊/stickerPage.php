<?php

session_start();
require 'config/db.php';
require 'config/sql.php';
require 'models/stickers.php';

//QUERY FROM STICKER
$stickers = fetchAllStickers($conn);

$list = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

//GET STICKER LIST ID
$stickerId = $_GET["sticker"] ?? "1";
$sticker = $stickers[($stickerId - 1)];

$account = $_SESSION["account"] ?? "";
$name = $_SESSION["name"] ?? "";

?>

<html>

<?php require("header.php") ?>

<body class="page__sticker">
    <div class="wrapper">

        <header class="header">
            <h1 class="header__logo">
                <a href="#"><span>WEB</span>STORE</a>
            </h1>
            <div class="header__search" data-widget="SearchBox">
                <form method="POST">
                    <span class="header__search_icon ">
                        <i class="material-icons icon-search">search</i>
                    </span>
                    <span></span>
                    <input class="header__search_input" type="text" name="q" placeholder="搜尋" value="">
                </form>
            </div>
            <ul class="header__util">
            <?php if ($account) { ?>
                <li class="header__util_item wish-box">
                    <a><span>你好，<?= $name ?></span></a>
                    <span class="util__item_line">|</span>
                </li>
            <?php }?>
                <li class="header__util_item wish-box">
                    <a href="/wishlist/zh-Hant">
                        <span class="util__item_icon">
                            <i class="material-icons icon-wish">favorite_border</i>
                        </span>
                        <span>願望清單</span>
                    </a>
                    <span class="util__item_line">|</span>
                </li>
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
                            <a href="stickerPage.php?sticker=<?= $sticker->id ?>" >
                            <?= $sticker->title ?> 
                        </a> 
                    </li> 
                    <?php } ?> 
                    </ul> 
                </nav> 
            </div>
            <div class="main">
                                <section class="main__section">
                                    <div class="main__section--sticker-view">
                                        <div class="section__endTop">
                                            <div class="endTop__graphic">
                                                <img class="endTop__graphic_img" width="230" height="230" src="./img/sticker-<?= $stickerId . '/index' ?>.png">
                                                <div class="endTop__graphic_preview"></div>
                                            </div>
                                            <ul class="endTop__block">
                                                <div class="endTop__block_head">
                                                    <!-- STICKER TITLE -->
                                                    <p class="endTop__block_title"><?= $sticker->title ?></p>
                                                </div>
                                                <a class="endTop__block_author"><?= $sticker->author ?></a>
                                                <p class="endTop__block_text"><?= $sticker->description ?></p>
                                                <div class="endTop__block_info">
                                                    <p class="endTop__info_price">NT$<?= $sticker->price ?></p>
                                                    <p class="endTop__info_wish">
                                                        <label class="info__wish">
                                                            <input type="checkbox" name="" value="" class="mdIco01WishInp">
                                                            <span class="mdIco01WishTxt">
                                                                <i class="material-icons icon-wish">favorite</i>
                                                            </span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <ul class="endTop__block_button">
                                                    <li>
                                                        <button class="button--gift">贈送禮物</button>
                                                    </li>
                                                    <li>
                                                        <button class="button--purchase">購買</button>
                                                    </li>
                                                </ul>
                                            </ul>
                                        </div>
                                        <!-- 分隔線 -->
                                        <div class="section__line"></div>
                                        <!-- 貼圖預覽 -->
                                        <div class="section__detailView stickers">
                                            <div class="section__detailView_preview ">
                                                <p class="detailView__preview_text">點擊貼圖即可預覽。</p>
                                            </div>
                                            <div class="section__detailView_imgList">
                                                <div class="MdLoader FnLoading" style="opacity: 1; display: none;">
                                                    <div class="mdLoaderInner mdLoaderDetail">
                                                        <div class="mdLoadSpinner"></div>
                                                    </div>
                                                </div>
                                                <div class="MdLoader FnReloadBtn" style="opacity: 1; display: none;">
                                                    <div class="mdLoaderInner">
                                                        <p class="mdLoadReLoad" data-event-label="sticker_official">重試</p>
                                                    </div>
                                                </div>

                                                <div class="detailView__imgList_warp">
                                                    <ul class="sticker detailView__stickerList">
                                                        <?php foreach ($list as $num) { ?>
                                                            <li class="sticker__li detailView__stickerList_item">
                                                                <div class="sticker__li_inner detailView__stickerList_image">
                                                                    <span class="sticker__image detailView__stickerList_customBase" style="background-image:url(./img/sticker-<?= $stickerId . '/' . $num ?>.png);"></span>
                                                                </div>
                                                                <div class="sticker__imgPreview detailView__stickerList_previewImage nonDisp">
                                                                    <span class="sticker__image detailView__stickerList_preview" style="background-image:url(./img/sticker-<?= $stickerId . '/' . $num ?>.png);">
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="MdOverlay01 FnStickerPreviewOverlay nonDisp" style="pointer-events: none;"></div>
                                                </div>
                                                <div class="FnPreviewWrapper nonDisp"></div>
                                            </div>
                                            <p class="section__detailView_copy">©TORIONE</p>
                                            <p class="section__detailView_text">
                                                <a>系統環境注意事項</a>
                                            </p>
                                            <div class="section__detailView_share">
                                                <ul class="detailView__shareList">
                                                    <li class="detailView__shareList_item">
                                                        <a>
                                                            <span class="shareList_item--line">LINE Share</span>
                                                        </a>
                                                    </li>
                                                    <li class="detailView__shareList_item">
                                                        <a>
                                                            <span class="shareList_item--tw">Twitter Share</span>
                                                        </a>
                                                    </li>
                                                    <li class="detailView__shareList_item">
                                                        <a>
                                                            <span class="shareList_item--fb">Facebook Share</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--/MdCMN22Share-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main__section--other">
                                        <div class="section__head">
                                            <h2 class="section__head_title">TINY的作業說明</h2>
                                        </div>
                                        <div class="section__block">
                                            <ul class="section__noteList">
                                                <li class="section__noteList_item">
                                                    <a title="以下是作業說明">
                                                        <div class="noteList__item mdCMN07Sticker">
                                                            <div class="noteList__item_img">
                                                                <img src="https://stickershop.line-scdn.net/stickershop/v1/product/14985/LINEStorePC/thumbnail_shop.png;compress=true" width="60" height="60">
                                                            </div>
                                                            <div class="noteList__item_text">
                                                                <h3 class="noteList__item_title">努力完成作業，解鎖更多特輯！</h3>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="section__noteList_item">
                                                    <span class="noteList__item_text">
                                                        網頁說明
                                                    </span>
                                                    <p class="noteList__item_detail">
                                                        ．<span>除了預覽貼圖，目前其他功能未開放。</span>
                                                    </p>
                                                    
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </section>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.sticker__li').click(function() {
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
        });
    </script>
</body>

</html>
