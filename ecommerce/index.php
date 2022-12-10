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
    
?>
<div class="carousel-container">
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).webp" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).webp" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).webp" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-3">
    <?php
            $get_featured_product = $product->get_all_product();
            if ($get_featured_product) {
                while ($result = $get_featured_product->fetch_assoc()) {

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