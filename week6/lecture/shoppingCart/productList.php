<?php
require 'productData.php';
$productData = new ProductData();
$productList = $productData->listAllProducts();
?>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>
  <table>
    <tr>
      <th>產品編號</th>
      <th>產品名稱</th>
      <th>價格</th>
      <th></th>
    </tr>
    <?php
    foreach ($productList as $product) {
      ?>
      <form action="cartAdd.php" method="post">
        <tr>
          <td><?= $product->id ?></td>
          <td><?= $product->name ?></td>
          <td><?= $product->price ?></td>
          <td><a href="productShow.php?id=<?= $product->id ?>">看內容</a></td>

          <input type="hidden" name="id" value="<?= $product->id ?>">
          <td>數量: <input type="text" name="qty"></td>
          <td><input type="submit" value="Add"></td>
        </tr>
      </form>
    <?php
    }
    ?>

  </table>


</body>

</html>