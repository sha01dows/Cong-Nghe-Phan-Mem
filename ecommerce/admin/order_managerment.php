<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/Cart.php'; ?>
<?php include_once '../format/Format.php'; ?>

<?php
$cart = new Cart();
$format = new Format();
?>
<?php
if (isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
    $price = $_GET['price'];
    $shift = $cart->productShifted($id, $price);
}


if (isset($_GET['delproid'])) {
    $id = $_GET['delproid'];
    $price = $_GET['price'];
    $delOrder = $cart->delproductShifted($id, $price);
}
?>
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
        <h1>Order List</h1>
        <?php
        if (isset($shift)) {
            echo $shift;
        }

        if (isset($delOrder)) {
            echo $delOrder;
        }

        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">User Detail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $get_product = $cart->get_all_ordered();
                if ($get_product) {
                    $i = 0;
                    while ($result = $get_product->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $result['user_id']; ?></td>
                            <td><?php echo $result['product_id'] ?></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['price'] ?> $</td>
                            <td><?php
                                if ($result['status'] == 0) {
                                    echo "Pending";
                                } else {
                                    echo "Delivered";
                                }
                                ?></td>
                            <td><a class="action" href="user_detail.php?user_id=<?php echo $result['user_id'] ?>">View Address</a></td>
                            <?php if ($result['status'] == '0') { ?>
                                <td><a href="?shiftid=<?php echo $result['user_id']; ?>&price=<?php echo $result['price']; ?>">Shifted</a></td>
                            <?php    } else {    ?>
                                <td><a href="?delproid=<?php echo $result['user_id']; ?>&price=<?php echo $result['price']; ?>">Remove</a></td>
                            <?php } ?>
                            <!-- <a class="action" href="">Shipped</a> -->
                        </tr>
                <?php }
                } ?>
                <!-- <a href="product_add.php">
          <input style="color: #ffffff ;background-color:#487eb0 !important;" class="btn btn-lg" type="submit" name="submit" value="Add Product" />
        </a> -->
            </tbody>

        </table>
    </div>
</div>
<?php include_once 'components/footer.php'; ?>