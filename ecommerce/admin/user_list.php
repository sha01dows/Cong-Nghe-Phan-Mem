<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/User.php'; ?>
<?php include_once '../format/Format.php'; ?>

<?php
$user = new User();
$format = new Format();
?>

<style>
  .product-list {
    margin: 150px auto;
  }

  .action {
    text-decoration: none;
    color: #ff2441;
  }

  .action:hover {
    text-decoration: none;
    color: #ff2bae;
  }

  .success {
    color: #009411;
  }
</style>

<div class="d-flex">
  <?php include_once 'components/sidebar.php'; ?>
  <div class="product-list">
    <h1>User List</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Zip Code </th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $get_user = $user->get_all_user();
        if ($get_user) {
          $i = 0;
          while ($result = $get_user->fetch_assoc()) {
            $i++;
        ?>
            <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $format->textShorten($result['address'], 50)  ?></td>
              <td><?php echo $result['city'] ?></td>
              <td><?php echo $result['phone_number'] ?> $</td>
              <td><?php echo $result['zip_code']; ?></td>
              <td><?php echo $result['email']; ?></td>
              <td><a onclick="return confirm('Are you sure to delete this user?')" class="action" href="?deluser=<?php echo $result['user_id']; ?>">Delete</a></td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include_once 'components/footer.php'; ?>