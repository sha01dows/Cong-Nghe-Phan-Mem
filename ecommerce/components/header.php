<?php
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/db.php";
include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/Session.php";
include_once 'format/Format.php';
Session::init();
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$format = new Format();
$product = new Product();
$cart = new Cart();
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./resources/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome</title>
</head>
<style>
    .header {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #353b48 !important;
        z-index: 99;
    }
</style>

<body>
    <?php
        if(isset($_GET['user_id'])){
            $delData = $cart->clear_user_cart();
            Session::destroy();
        }
    ?>
    <nav class="header navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="d-flex justify-content-between container-fluid ">
            <div class="mx-4">
                <img src="./img/logo.png" style="width: 50px; height: 50px" alt="">
                <a class="navbar-brand" href="/ecommerce">T Mall</a>
            </div>
            <form class="d-flex" action="search.php" name="search" method="get">
                <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php
            $login =  Session::get("user_login");
            if ($login == false) { ?>
                <ul class="navbar-nav mb-2 mb-lg-0 mr-5">
                    <li class="nav-item">

                        <a class="nav-link active" href="/ecommerce/login.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/ecommerce/signup.php">Sign Up</a>
                    </li>
                </ul>
            <?php } else {?>
                <ul class="navbar-nav mb-2 mb-lg-0 mr-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Welcome, <?php echo Session::get('user_name') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?user_id=<?php echo Session::get('user_id')?>">Sign out</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</body>
</html>