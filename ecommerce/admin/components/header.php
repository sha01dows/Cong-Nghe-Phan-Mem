<?php
    include_once '../classes/adminLogin.php';
    include_once '../Lib/Session.php';
    Session::checkSession();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
    <title>Admin Panel</title>
    <script src="../resources/bootstrap.min.js"></script>
</head>
<style>
    .header{
        position: fixed;
        top: 0;
        width:100%;
        background-color: #353b48 !important;
        z-index: 99;
    }
</style>
<body>
    <nav class="header navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="d-flex justify-content-between container-fluid ">
            <div class="mx-4">
                <img src="../img/logo.png" style="width: 50px; height: 50px" alt="logo">
                <a class="navbar-brand" href="#">Admin Panel</a>
            </div>
            <?php
               if(isset($_GET['action']) && $_GET['action'] == "logout") {
                    Session::destroy();
               }
            ?>
            <ul class="navbar-nav mb-2 mb-lg-0 mr-5">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Welcome, <?php echo Session::get('admin_name'); ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>