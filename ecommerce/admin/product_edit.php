<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php include_once '../classes/Product.php'; ?>


<?php
if (!isset($_GET['product_id'])  || $_GET['product_id'] == NULL) {
    echo "<script>window.location = 'productedit.php';  </script>";
} else {
    $id = $_GET['product_id'];
}

$product =  new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $product->productUpdate($_POST, $_FILES, $id);
}

?>


<style>
    .container {
        margin-top: 150px !important;
    }

    .container1 {
        display: flex;
        justify-content: space-around;
    }

    .success {
        font-size: 30px;
        color: #00ff11;
    }

    .error {
        font-size: 30px;
        color: #ff1414;
    }

    .big-item {
        margin: 0px auto;
    }
</style>
<div class="container1">
    <?php include_once 'components/sidebar.php'; ?>
    <div class="container tm-mt-big tm-mb-big mt-5 big-item">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Update Product With ID : <?php echo $id ?></h2>
                        </div>
                    </div>

                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <?php
                            if (isset($updateProduct)) {
                                echo $updateProduct;
                            }
                            ?>
                            <?php
                            $getProd = $product->getProById($id);
                            if ($getProd) {
                                while ($value = $getProd->fetch_assoc()) {
                            ?>
                                    <form class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="product_name">New Product Name
                                            </label>
                                            <input id="product_name" value="<?php echo $value['product_name'] ?>" name="product_name" type="text" class="form-control validate" required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="body">New Description</label>
                                            <textarea class="form-control validate" name="body" rows="3" required>
                                        <?php echo $value['body'] ?>
                                    </textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_id">New Category</label>
                                            <select class="custom-select tm-select-accounts" id="category_id" name="category_id">
                                                <option selected>Select category</option>
                                                <?php
                                                $cate = new Category();
                                                $get_cate = $cate->get_all_categories();
                                                if ($get_cate) {
                                                    while ($result = $get_cate->fetch_assoc()) {
                                                ?>
                                                        <option value="<?php echo $result['category_id']; ?>">
                                                            <?php echo $result['category_name']; ?>
                                                        </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="price">New Price
                                                </label>
                                                <input id="price" value="<?php echo $value['price'] ?>" name="price" type="text" class="form-control validate" data-large-mode="true" />
                                            </div>
                                            <!-- <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="stock">Units In Stock
                                        </label>
                                        <input id="stock" name="stock" type="text" class="form-control validate" required />
                                    </div> -->
                                            <div class="d-flex float-left my-3">
                                                <label for="category">New Type</label>
                                                <select class="custom-select tm-select-accounts mx-2" id="category" name="type">
                                                    <option selected>Select Type</option>
                                                    <option value="1">Fetured</option>
                                                    <option value="2">General</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="file" name="image" class="my-3 btn btn-outline-secondary btn-block mx-auto" value="<?php echo $value['image'] ?>" />

                        </div>
                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                
                        </div> -->
                        <div class="col-12">
                            <button type="submit" name="submit" value="submit" class="btn btn-outline-success btn-block text-uppercase">Update</button>
                        </div>
                        </form>
                <?php  }
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'components/footer.php'; ?>