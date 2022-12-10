<?php include_once 'components/header.php' ?>

<style>
    .edit-profile{
        margin: 0xp 10px !important;
    }

</style>


<?php
if (Session::get("user_login") == false) {
    header("Location:login.php");
}
$id = Session::get('user_id');
?>



<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-lg-4">

                <div class="card mb-4">
                    <div class="card-body text-center">
                    <?php
                    $getdata = $user->get_user_data($id);
                    if ($getdata) {
                        while ($result = $getdata->fetch_assoc()) {
                    ?>
                        <img src="img/avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $result['name']; ?></h5>
                        <p class="text-muted mb-1"><?php echo $result['phone_number']; ?></p>
                        <p class="text-muted mb-4"><?php echo $result['city']; ?></p>
                        <div class="d-flex justify-content-center mb-2">

                        <?php }
                    } ?>
                            <a class="btn btn-primary" href="cart.php">Your Cart</a> 
                            <a type="button" href="order_detail.php" class="btn btn-outline-primary ms-1">Ordered</a>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg text-warning"></i>
                                <p class="mb-0"><a href="https://kmacybersec.me/" target="_blank" style="text-decoration: none; color: black"></a>https://www.facebook.com/Shad0210</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0"><a href="https://github.com/quangdaik2362001" target="_blank" style="text-decoration: none; color: black">Huyen Trang- Nguyen Tuyet</a></p>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                <p class="mb-0"><a href="https://www.instagram.com/_n.quanggg_/" target="_blank" style="text-decoration: none; color: black">shadow</a></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0"><a href="https://www.facebook.com/shadow/" target="_blank" style="text-decoration: none; color: black"></a>https://www.facebook.com/Shad0210</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <?php
                    $getdata = $user->get_user_data($id);
                    if ($getdata) {
                        while ($result = $getdata->fetch_assoc()) {
                    ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['name']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['email']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['phone_number']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">City</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['city']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['address']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Country</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['country']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Zip Code</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $result['zip_code']; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <div class=" edit-profile"> <a class="btn btn-outline-primary mx-5 my-2" style="float:right;" href="editprofile.php">Edit Profile</a></div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</section>