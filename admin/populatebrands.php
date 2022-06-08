<?php require("../config/dbconnect.php"); ?>
<?php
if (isset($_POST['cat_id'])) {
  $product_method = $_POST['product_method'];
  $set_product_brand = (($_POST['set_product_brand'] != '') ? $_POST['set_product_brand'] : '');
  $sql = "SELECT * from brand_master where bm_categoryid=". mysqli_real_escape_string($conn, $_POST['cat_id']);
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) { ?>
    <option disabled selected value=''>Choose...</option>
    <?php while ($row = mysqli_fetch_array($res)) { ?>
      <?php if ($product_method == 'edit' && $set_product_brand == $row['bm_brandid']) { ?>
        <option value="<?= $row['bm_brandid'] ?>" selected><?= $row['bm_brandname'] ?></option>
      <?php } else { ?>
        <option value="<?= $row['bm_brandid'] ?>"><?= $row['bm_brandname'] ?></option>
<?php }
    }
  }
} else {
  header('location:manage_products.php');
}
?>