<?php
include_once 'components/header.php';
?>
<style>
    .container {
        margin-top: 50px;
        z-index: -1;
        margin-bottom: 90px;
    }

    .carousel-container {
        margin-top: 90px !important;
        z-index: -1;
        height: 540px;
        width: 1295px;
        margin: 0px auto;
        border-radius: 5px !important;
    }

    .add-cart {
        padding: 10px 15px;
        background-color: #dfe6e9;
        border-radius: 9px;
        text-decoration: none;
        color: black;
    }

    .add-cart:hover {
        padding: 10px 15px;
        background-color: #26de81;
        border-radius: 9px;
        text-decoration: none;
        color: black;
    }
</style>



<?php
if (!isset($_GET['search'])  || $_GET['search'] == NULL) {
    echo "<script>window.location = '404.php';  </script>";
} else {
    $search = $_GET['search'];
}

?>

<h1>Searching for </h1>
<div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-3">
        <?php
        $productbysearch = $product->productBySearch($search);
        if ($productbysearch) {
            while ($result = $productbysearch->fetch_assoc()) {
        ?>
                <div class="col mb-4">

                    <div class="card h-100">
                        <div class="view overlay">
                            <img class="card-img-top" src="admin/<?php echo $result['image'] ?>" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $result['product_name'] ?></h4>
                            <p class="card-text"><?php echo $format->textShorten($result['body'], 80) ?></p>
                            <div class="mt-2 d-flex justify-content-around">
                                <a class="add-cart" href="preview.php?product_id=<?php echo $result['product_id']; ?>" style="text-decoration: none; color: black">Detail </a>
                                <a class="add-cart" href="">Add Cart</a>
                                <div class="card-text mt-2"><?php echo $result['price'] ?>$</div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
include_once 'components/footer.php'
?>