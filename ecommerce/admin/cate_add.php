<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/Category.php'; ?>

<?php
$category = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $insert_category = $category->insert_cate($category_name);
}
?>

<style>
    .cate-add {
        margin: 80px auto;
    }

    .form {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .save-btn {
        color: #f0edee;
        padding: 5px 20px;
        border: 1px solid;
        border-radius: 5px;
        background-color: #ff1239;
    }

    .cate-input {
        padding: 5px 20px;
        border: 1px solid;
        border-radius: 5px;
    }

    .infomation {
        color: red;
        font-size: 15px;
    }

    .main-box {
        padding: 300px 550px;
        border: 1px solid #141313;
        border-radius: 10px;
    }
</style>
<div class="d-flex justify-content-between">
    
<?php include_once 'components/sidebar.php'; ?>
    <div class="grid_10 cate-add">
        <div class="box round first grid main-box">
            <h2>Add New Category</h2>
            <div class="block copyblock">
                <?php
                if (isset($insert_category)) {
                    echo $insert_category;
                }
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input class="cate-input" type="text" name="category_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="save-btn btn-block" type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="table">
                <table class="cate-list table table-sm table-light">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">ID</th>
                            <th scope="col">Category name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_cate = $category->get_all_categories();
                        if ($get_cate) {
                            $i = 0;
                            while ($result = $get_cate->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $result['category_name'] ?></td>
                                    <td><a href="catedit.php?catid=<?php echo $result['category_id']; ?>">Edit</a> || <a href="">Delete</a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php
include_once 'components/footer.php'
?>