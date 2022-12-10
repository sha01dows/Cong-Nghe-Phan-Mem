<style>
    .containerz{
        color: #fff !important;
        width: 280px;
        height: 960px;
        font-size: 20px;
        background-color: #353b48 !important;
    }
    .ul-class{
        margin: 150px auto !important;

    }
</style>
<div class="containerz flex-shrink-0 p-3 bg-dark navbar-dark">
    <ul class="ul-class list-unstyled ps-0 my-5" style="padding-left: 30px !important;">
      <li class="mb-3">
        <button class="mb-2 btn btn-outline-light btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="/ecommerce/admin/dashboard.php" class="link-light rounded">Admin Dashboard</a></li>
            <li><a href="/ecommerce" target="_blank" class="link-light rounded">Store</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-3">
        <button class="mb-2 btn btn-outline-light btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Product Manager
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="cate_add.php" class="link-light rounded">Category Manager</a></li>
            <li><a href="product_add.php" class="link-light rounded">Add Product</a></li>
            <li><a href="product_list.php" class="link-light rounded">Show Products List</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-outline-light btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          User Manager
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="user_list.php" class="link-light rounded">List User</a></li>
            <li><a href="order_managerment.php" class="link-light rounded">User Order</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
    </ul>
  </div>