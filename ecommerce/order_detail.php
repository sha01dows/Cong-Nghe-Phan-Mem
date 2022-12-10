<?php include_once 'components/header.php' ?>

<?php
if (Session::get("user_login") == false) {
    header("Location:login.php");
}
?>
<style>
    body {
        background: #eecda3;
        background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
        background: linear-gradient(to right, #eecda3, #ef629f);
        min-height: 100vh;
    }

    .error {
        color: red;
    }

    .mt-5 {
        margin-top: 8rem !important;
    }
</style>

<?php
if (Session::get("user_login") == false) {
    header("Location:login.php");
}
?>

<div class="px-4 px-lg-0 mt-5">
    <div class="pb-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product Name</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Status</div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $user_id = Session::get('user_id');
                                $get_detail = $cart->get_order_detail($user_id);
                                if ($get_detail) {
                                    while ($result = $get_detail->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="admin/<?php echo $result['image'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"><a target="_blank" href="preview.php?product_id=<?php echo $result['product_id']; ?>" class="text-dark d-inline-block align-middle"><?php echo $result['product_name'] ?></a></h5>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong><?php echo $result['price'] ?> $</strong></td>
                                            <td class="border-0 align-middle"><strong><?php echo $result['quantity'] ?></strong></td>
                                            <td class='border-0 align-middle'><?php if ($result['status'] == '0') {
                                                                                    echo 'Pending';
                                                                                } else {
                                                                                    echo 'Delivered';
                                                                                }
                                                                                ?></td>


                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>