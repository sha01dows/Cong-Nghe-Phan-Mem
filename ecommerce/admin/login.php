<?php
    include_once '../classes/adminLogin.php';
    include_once "$_SERVER[DOCUMENT_ROOT]/ecommerce/Lib/Session.php";

    if(Session::get("adminlogin") == true){
        header("Location:dashboard.php");
    }
?>

<?php
    $admin_login = new AdminLogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $admin_user = $_POST['username'];
        $admin_password = md5($_POST['password']);
        $do_login = $admin_login->adminLogin($admin_user, $admin_password);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
    <title>Admin Login</title>
</head>

<body>
    <section class="vh-100" style="background: rgb(122,186,255);
background: linear-gradient(40deg, rgba(122,186,255,1) 0%, rgba(175,222,91,1) 35%, rgba(252,122,158,1) 100%);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="" method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Admin Panel</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your admin account</h5>
                                        <span style="font-size: 15px; color:red;">
                                            <?php
                                                if (isset($do_login)) {
                                                    echo $do_login;
                                                }
                                            ?>
                                        </span>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="username" class="form-control form-control-lg" name="username" />
                                            <label class="form-label" for="username">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-danger btn-lg btn-block" type="button">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>