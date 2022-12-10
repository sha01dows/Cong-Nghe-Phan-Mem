<?php
include_once 'components/header.php';
?>

<style>
  body {
    background: #eecda3;
    background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
    background: linear-gradient(to right, #eecda3, #ef629f);
    min-height: 100vh;
  }
  .error{
    color: red;
  }
  .mt-5 {
    margin-top: 8rem !important;
  }
</style>

<?php
  if(isset($_GET['delcart'])){
    $del_id = $_GET['delcart'];
    $del_product = $cart->del_cart_items($del_id);
  }
?>

<?php
  if(Session::get("user_login") == false){
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
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>

              <tbody>
                <?php
                $get_cart = $cart->get_cart_items();
                $total_price = 0;
                if ($get_cart) {
                  while ($result = $get_cart->fetch_assoc()) {
                ?>
                    <tr>
                      <th scope="row" class="border-0">
                        <div class="p-2">
                          <img src="admin/<?php echo $result['image'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a target="_blank" href="preview.php?product_id=<?php echo $result['product_id']; ?>" class="text-dark d-inline-block align-middle"><?php echo $result['product_name'] ?></a></h5>
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong><?php echo $result['price'] ?></strong></td>
                      <td class="border-0 align-middle"><strong><?php echo $result['quantity'] ?> </strong></td>
                      <td class="border-0 align-middle"><a onclick="return confirm('Are you sure you want to delete this item ?')" href="?delcart=<?php echo $result['product_id'] ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php $total_price += $result['price']*$result['quantity'] ?>
                <?php
                  }
                }
                ?>
                <!-- <h5><?php echo $total_price ?></h5> -->
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><?php echo $total_price ?> $</h5>
              </li>
            </ul>
            <a href="checkout.php" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
            <a href="index.php" class="btn btn-outline-danger rounded-pill py-2 btn-block" style="">Continue Shopping</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>