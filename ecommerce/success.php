<?php include_once 'components/header.php' ?>
<?php
    if(Session::get("user_login")==false){
        header("Location:login.php");
    }
?>

<h1 style="margin: 120px auto;">
    Order Successfully !! <br>
    <a style="text-decoration: none;" class="btn btn-primary btn-md"href="index.php">Homepage</a>
</h1>