<?php include_once 'components/header.php' ?>

<style>
    .container {
        margin-top: 100px;
        margin-bottom: 100px;
    }
</style>

<?php
if (Session::get("user_login") == false) {
    header("Location:login.php");
}
?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $user_id =  Session::get("user_id");
    $insert_order = $cart->add_to_order($user_id);
    $delDate = $cart->clear_user_cart();
    header("Location:success.php");
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <?php
                $get_cart = $cart->get_cart_items();
                $total_price = 0;
                if ($get_cart) {
                    while ($result = $get_cart->fetch_assoc()) {
                ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $result['product_name']; ?></h6>
                                <small>Quantity: <span class="text-muted"><?php echo $result['quantity'] ?></span></small>
                            </div>
                            
                            <span class="text-muted"><?php echo $result['price'] ?> $</span>

                        </li>
                <?php
                        $total_price += $result['price'] * $result['quantity'];
                    }
                } ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong><?php echo $total_price?> $</strong>
                </li>

            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>

            <form class="needs-validation" novalidate>
                <?php
                $id = Session::get('user_id');
                $getdata = $user->get_user_data($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">User name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" disabled value="<?php echo $result['name'] ?>" required>
                                <!-- <span></span> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" placeholder="" disabled value="<?php echo $result['phone_number'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email<span class="text-muted"></span></label>
                            <input type="email" class="form-control" disabled value="<?php echo $result['email'] ?>" id="email" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" disabled value="<?php echo $result['address'] ?>" id="address" placeholder="1234 Main St" required>

                        </div>



                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">City</label>
                                <input type="text" class="form-control" id="zip" disabled value="<?php echo $result['city'] ?>" placeholder="" required>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">Country</label>
                                <input type="text" class="form-control" disabled value="<?php echo $result['country'] ?>" id="zip" placeholder="" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" disabled value="<?php echo $result['zip_code'] ?>" id="zip" placeholder="" required>
                            </div>
                        </div>
                        <a class="btn btn-outline-dark btn-sm" href="editprofile.php">Edit Profile</a>
                        <hr class="mb-4">
                        <a class="btn btn-outline-primary btn-lg btn-block" name="order" href="?orderid=order" type="submit">Comfirm</a>
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>


<?php include_once 'components/footer.php' ?>