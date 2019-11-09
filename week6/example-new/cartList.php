<?php
require 'cart.php';
require 'productData.php';
session_start();

if(!isset($_SESSION["account"])){
  header("Location: login.php?msg=nolog");
}

$productData = new ProductData();
$productsTitle = $_SESSION["productsTitle"] ?? [];

$account = $_SESSION["account"] ?? "";

//prevent error when session does not exist
$shoppingCart = $_SESSION["cart"] ?? [];
//initialize an empty list
$shoppingList = [];
foreach( $shoppingCart as $item ) {
  
 $product = $productData->retrieveProduct($item->id);
 //combine cart with product
 $fullProduct = new Cart($item->id, $item->qty, $product);
 array_push($shoppingList, $fullProduct);
}


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
               <li class="navbar__list_item">
               <a class="icon" href="sessionClear.php?clear=cart">
                 CLEAR
               <i class="material-icons icon_delete">remove_shopping_cart</i>
               </a>
              </li>
              <li class="navbar__list_item">
              <a class="icon" href="productList.php">
                BACK
              <i class="material-icons icon_back">chevron_right</i>
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
                <?= $titleAttr['name'] ?>
              </th>
            <?php } ?>
          </tr>
        </thead>
        <tbody class="table__content">
          <?php foreach( $shoppingList as $item )  { ?>
            <tr class="table__row">
                <td class="table__cell"><?= $item->id ?></td>
                <td class="table__cell"><?= $item->product->name ?></td>
                <td class="table__cell"><?= $item->product->price ?></td>
                <td class="table__cell table__cell--qty"><?= $item->qty ?></td>
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