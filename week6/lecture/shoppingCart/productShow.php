<?php
require 'productData.php';
$id = $_GET["id"] ?? "0";
$productData = new ProductData();
$product = $productData->retrieveProduct($id);
?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>
 <form action="cartAdd.php" method="post">
  產品編號: <?=$product->id?><br>
  <input type="hidden" name="id" value="<?=$product->id?>">
  產品名稱: <?=$product->name?><br>
  價格: <?=$product->price?><br>
  數量: <input type="text" name="qty"><br>
  <input type="submit" value="Add">
 </form>

</body>

</html>