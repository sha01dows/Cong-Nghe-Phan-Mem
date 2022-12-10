<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/Product.php'; ?>
<?php include_once '../format/Format.php'; ?>

<?php
$product = new Product();
$format = new Format();
?>

<?php
if (isset($_GET['delproduct'])) {
  $id = $_GET['delproduct'];
  $delpro = $product->delete_product_by_id($id);
}

?>
<style>
  .product-list {
    margin: 150px auto;
  }

  .action {
    text-decoration: none;
    color: #ff2441;
  }

  .action:hover {
    text-decoration: none;
    color: #ff2bae;
  }

  .success {
    color: #009411;
  }
</style>

<div class="d-flex">
  <?php include_once 'components/sidebar.php'; ?>
  <div class="product-list">
    <h1>Product List</h1>
    <?php
    if (isset($delpro)) {
      echo $delpro;
    }
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $get_product = $product->get_all_products();
        if ($get_product) {
          $i = 0;
          while ($result = $get_product->fetch_assoc()) {
            $i++;
        ?>
            <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $result['product_name']; ?></td>
              <td><?php echo $result['category_name'] ?></td>
              <td><?php echo $format->textShorten($result['body'], 50) ?></td>
              <td><?php echo $result['price'] ?> $</td>
              <td><img src="<?php echo $result['image']; ?>" height=40px width=40px alt=""></td>
              <td><?php
                  if ($result['type'] == 0) {
                    echo "Fetured";
                  } else {
                    echo "General";
                  }
                  ?></td>
              <td><a class="action" href="product_edit.php?product_id=<?php echo $result['product_id'] ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this product?')" class="action" href="?delproduct=<?php echo $result['product_id']; ?>">Delete</a></td>
            </tr>
        <?php }
        } ?>
        <a href="product_add.php">
          <input style="color: #ffffff ;background-color:#487eb0 !important;" class="btn btn-lg" type="submit" name="submit" value="Add Product" />
        </a>
      </tbody>

    </table>
  </div>
</div>
<?php include_once 'components/footer.php'; ?>