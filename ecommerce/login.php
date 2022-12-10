<?php include_once 'components/header.php' ?>
    <?php
    $login =  Session::get("user_login");
    if ($login == true) {
        header("Location:index.php");
    }
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $user_login = $user->user_login($_POST);
    }
    ?>
    <section class="h-100 gradient-form" style="background: rgb(122,186,255);
background: linear-gradient(40deg, rgba(122,186,255,1) 0%, rgba(175,222,91,1) 35%, rgba(252,122,158,1) 100%);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
<!--                                        <img src="img/logo2.png" style="width: 185px;" alt="logo">-->
                                        <h4 class="mt-1 mb-5 pb-1">We are The CyStack Team</h4>
                                        <?php
                                        if (isset($user_login)) {
                                            echo $user_login;
                                        }
                                        ?>
                                    </div>

                                    <form method="POST" action="">
                                        <p>Please login to your account</p>
                                        
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" required="true" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="true" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-3 px-5 py-3" value="Login" name="submit" type="submit">
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a href="signup.php"> <button type="button" class="btn btn-outline-success"> Create new </button></a>
                                    </div>
                                    <p class="d-flex justify-content-center">
                                        Or go to <a class="mx-2 link" href="/ecommerce">Home Page</a>
                                    <p>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center right-pannel">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 style="color:black" class="mb-4">We are more than just a company</h4>
                                    <p style="color:black" class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>