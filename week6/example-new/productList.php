<?php
require 'productData.php';
session_start();

if (!isset($_SESSION["account"])) {
  $_SESSION["authority"] = "visitor";
}

$authority = $_SESSION["authority"] ?? "";
$account = $_SESSION["account"] ?? "";

//table prepare
$productData = new ProductData();
$productList = $productData->listAllProducts();
$productsTitle = $productData->listProductsTitle();

if ($account) {
  $productsTitle = array_merge($productsTitle, ["qty" => ["name"=>"選購數量", "sort"=>false]]);
}
$_SESSION["productsTitle"] = $productsTitle;

//sort object
$sort = $_GET["sort"] ?? "";
usort($productList , 'comparator');


?>
<html>

<?php require("header.php") ?>

<body class="page__class">
  <div class="wrapper">
    <div class="page__class_table">
      <h3 class="class__table_title">
        Cart with Object
        <nav class="navbar">
          <div class="navbar__inner">
            <ul class="navbar__list">
              <?php if ($account) { ?>
                <li class="navbar__list_item">
                  <a class="icon" href="sessionClear.php?clear=account">
                    LOGOUT
                    <i class="material-icons icon_delete">account_circle</i>
                  </a>
                </li>
              <?php } ?>
              <li class="navbar__list_item">
                <a class="icon" href="cartList.php">
                  CART
                  <i class="material-icons icon_cart">shopping_cart</i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </h3>

      <table class="table">
        <thead class="table__head">
          <tr class="table__head_row table__row">

            <?php foreach ($productsTitle as $title => $titleAttr) { ?>
              <th class="table__head_cell table__cell table__cell--<?= $title ?>">
              <?php if ($authority == "admin" && $titleAttr["sort"]) { ?>
                  <a class="icon" href="productList.php?sort=<?= $title ?>">
                    <?= $titleAttr['name']; ?>
                    <i class="material-icons">expand_more</i>
                  </a>
                <?php } else { echo $titleAttr['name']; } ?>
              </th>
            <?php } ?>

          </tr>
        </thead>
        <tbody class="table__content">
          <?php foreach ($productList as $product) { ?>
            <tr class="table__row">
              <?php foreach ($productsTitle as $title => $titleAttr) { ?>
                <td class="table__cell table__cell--<?= $title ?>">

                  <?php if ($title == "qty") { ?>
                    <form action="cartAdd.php" method="post">
                      <input type="hidden" name="id" value=<?= $product->id; ?> />
                      <input class="table__input" type="text" name="qty" />
                      <button class="table__input_button icon " type="submit">
                        <i class="material-icons icon_add">add_circle</i>
                      </button>
                    </form>
                  <?php } else { echo $product->$title; } ?>

                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div id="moleskine" class="entry graphic-scale-25">
        <div></div>
      </div>
    </div>

  </div>
</body>

</html>