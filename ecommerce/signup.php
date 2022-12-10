<?php include_once 'components/header.php' ?>


<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .gradient-custom-2 {
        background: rgb(122, 186, 255);
        background: linear-gradient(40deg, rgba(122, 186, 255, 1) 0%, rgba(175, 222, 91, 1) 35%, rgba(252, 122, 158, 1) 100%);
    }

    .bg-indigo {
        background-color: #4835d4;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-indigo {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-indigo {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
    }
    .error{
        color: red;
        font-size: 20px;
    }
    .success{
        color:rgba(175, 222, 91, 1);
        font-size:20px;
    }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
              $user_reg = $user->user_register($_POST);
          }
?>
<form action="" method="post">
    <section class="h-100 h-custom gradient-custom-2" style="height: 100% !important;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 mt-5">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Register</h3>
                                        <?php
                                            if(isset($user_reg)){
                                                echo $user_reg;
                                            }
                                        ?>
                                        <div class="mb-4">
                                            <div class="form-outline form-white">
                                                <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                                <label class="form-label" for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" id="password" name="password" class="form-control form-control-lg" />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <input type="password" id="" name="" class="form-control form-control-lg" />
                                                    <label class="form-label" for="">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-outline form-white">
                                                <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                                <label class="form-label" for="name">Your Full Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5" style="background-color: #3c40c6; border-radius: 15px;">
                                        <h3 class="fw-normal mb-5">Details</h3>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="text" id="address" name="address" placeholder="" class="form-control form-control-lg" />
                                                <label class="form-label" for="address">Address</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="text" id="city" name="city" class="form-control form-control-lg" />
                                                <label class="form-label" for="city">City</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <input type="text" id="zip_code" name="zip_code" placeholder="" class="form-control form-control-lg" />
                                                    <label class="form-label" for="zip_code">Zip Code</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <input type="text" id="country" name="country" class="form-control form-control-lg" />
                                                    <label class="form-label" for="country">Country</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="" placeholder="" class="form-control form-control-lg" />
                                                    <label class="form-label" for="phone_number">Code +84 (default), etc...</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="phone_number" name="phone_number" class="form-control form-control-lg" />
                                                    <label class="form-label" for="phone_number">Phone Number</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label text-white" for="form2Example3">
                                                I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your
                                                site.
                                            </label>
                                        </div>
                                        <input type="submit" class="btn btn-outline-light btn-lg" name="submit" data-mdb-ripple-color="dark" value="Register" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php include_once 'components/footer.php' ?>