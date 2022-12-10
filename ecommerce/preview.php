<?php include_once 'components/header.php' ?>
<style>
    body {
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #f5f5f5
    }

    .hedding {
        font-size: 20px;
    }

    .main-section {
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translate(-50%, 5%);
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #E45641;
    }

    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }

    .shop {
        margin-top: 78px !important;
    }

    @media (min-width:360px) and (max-width:640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }
    }
</style>

<?php
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
    $add_cart = $cart->add_to_cart($quantity, $id);
}
?>

<div class="container mt-5">
    <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Product Detail
        </div>
        <?php
        $get_product_detail = $product->get_product_details($id);
        if ($get_product_detail) {
            while ($result = $get_product_detail->fetch_assoc()) {
        ?>
                <div class="row m-0">
                    <div class="col-lg-4 left-side-product-box pb-3">
                        <img src="admin/<?php echo $result['image'] ?>" class="border p-3">
                    </div>
                    <div class="col-lg-8">
                        <div class="right-side-pro-detail border p-3 m-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="m-0 p-0"><?php echo $result['product_name']; ?></p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="m-0 p-0 price-pro"><?php echo $result['price']; ?> $</p>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="col-lg-12">
                                    <p class="m-0 p-0 category"><?php echo $result['category_name']; ?></p>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <h5>Product Detail</h5>
                                    <span><?php echo $result['body']; ?></span>
                                    <hr class="m-0 pt-2 mt-2">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 pb-2">
                                            <form class="form-outline" method="post">
                                                <label class="form-label" for="quantity">Quantity</label>
                                                <input type="number" id="quantity" class="form-control" name="quantity" value="1" min="1" max="999"/>
                                                <input type="submit" id="submit" value="Add to Cart" name="submit" class="mt-2 btn btn-danger w-100" />
                                            </form>
                                        </div>
                                        <span style="color: red; font-size: 18px;">
                                            <?php
                                            if (isset($add_cart)) {
                                                echo $add_cart;
                                            }
                                            ?>
                                        </span>
                                        <div class="col-lg-6 mt-5 shop">
                                            <a href="/ecommerce" class="btn btn-success w-100">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

    </div>
</div>
<?php include_once 'components/header.php' ?>