<?php
require 'cart.php';
require 'productData.php';
$productData = new ProductData();
session_start();
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

<head>
 <meta charset="utf-8">
</head>
<a href="cartClear.php">清除購物車</a><br>
<a href="productList.php">繼續購物</a><br>
 
<body>
 <table>
  <tr>
   <th>產品編號</th>
   <th>產品名稱</th>
   <th>價格</th>
   <th>數量</th>
  </tr>
  <?php
  foreach( $shoppingList as $item ) {
  ?>
  <tr>
   <td><?=$item->id?></td>
   <td><?=$item->product->name?></td>
   <td><?=$item->product->price?></td>
   <td><?=$item->qty?></td>
  </tr>
  <?php
  }
  ?>

 </table>


</body>

</html>