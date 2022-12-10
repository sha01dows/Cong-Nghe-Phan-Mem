<?php include_once 'components/header.php' ?>

<style>
    .containerz {
        margin: 65px 0px;
        background: rgb(122, 186, 255);
        background: linear-gradient(40deg, rgba(122, 186, 255, 1) 0%, rgba(175, 222, 91, 1) 35%, rgba(252, 122, 158, 1) 100%);
        height: 100% !important;
    }

    .main-content {
        margin: 65px 0px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
    }

    .error {
        font-size: 15px;
        color: red;
    }

    .success {
        font-size: 15px;
        color: greenyellow;
    }
</style>
<?php
$id = Session::get('user_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $update_profile = $user->user_update($_POST, $id);
}
?>
<form action="" method="post">
    <div class="containerz">
        <div class="col-lg-6 bg-indigo text-white">
            <div class="p-5 main-content" style="background-color: #3c40c6; border-radius: 15px;">
                <h3 class="fw-normal mb-5">Update Profile</h3>
                <?php
                if (isset($update_profile)) {
                    echo $update_profile;
                }
                ?>
                <?php
                $getdata = $user->get_user_data($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                ?>
                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                                <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>" placeholder="" class="form-control form-control-lg" />
                                <label class="form-label" for="name">Name</label>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                                <input type="text" id="address" value="<?php echo $result['address']; ?>" name="address" placeholder="" class="form-control form-control-lg" />
                                <label class="form-label" for="address">Address</label>
                            </div>
                        </div>

                        <div class="mb-4 pb-2">
                            <div class="form-outline form-white">
                                <input type="text" id="city" value="<?php echo $result['city']; ?>" name="city" class="form-control form-control-lg" />
                                <label class="form-label" for="city">City</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-4 pb-2">
                                <div class="form-outline form-white">
                                    <input type="text" id="zip_code" value="<?php echo $result['zip_code']; ?>" name="zip_code" placeholder="" class="form-control form-control-lg" />
                                    <label class="form-label" for="zip_code">Zip Code</label>
                                </div>
                            </div>
                            <div class="col-md-7 mb-4 pb-2">
                                <div class="form-outline form-white">
                                    <input type="text" id="country" value="<?php echo $result['country']; ?>" name="country" class="form-control form-control-lg" />
                                    <label class="form-label" for="country">Country</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 mb-4 pb-2">
                                <div class="form-outline form-white">
                                    <input type="text" id="phone_number" value="<?php echo $result['phone_number']; ?>" name="phone_number" class="form-control form-control-lg" />
                                    <label class="form-label" for="phone_number">Phone Number</label>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <input type="submit" class="btn btn-outline-light btn-lg" name="submit" data-mdb-ripple-color="dark" value="Update" />
            </div>
        </div>
    </div>
</form>