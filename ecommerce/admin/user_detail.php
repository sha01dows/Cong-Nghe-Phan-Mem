<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/User.php'; ?>

<?php
if (!isset($_GET['user_id'])  || $_GET['user_id'] == NULL) {
    echo "<script>window.location = 'order_managerment.php';</script>";
} else {
    $id = $_GET['user_id'];
}
?>

<style>
    .detail{
        margin-top: 150px !important;
        float: right;
    }
    .containerx{
        display: flex;
        z-index: -1;
        justify-content: space-between;
    }
</style>

<div class="col-lg-8 containerx">
<?php  include_once 'components/sidebar.php' ?>
    <div class="card my-5 detail">
        <?php
        $user = new User();
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
    </div>
    <div class="row">
    </div>
</div>

<?php include_once 'components/footer.php' ?>