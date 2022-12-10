<?php include_once 'components/header.php'; ?>
<?php include_once '../classes/Category.php'; ?>

<?php
    if(!isset($_GET['catid']) || ($_GET['catid'] == NULL)){
        echo "<script>window.location = 'cate_add.php';</script>";
    }
    else{
        $id = $_GET['category_id'];
    }
?>

<?php
$category = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $insert_category = $category->catUpdate($category_name, $id);
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
            <h2>Update Category</h2>
            <div class="block copyblock">
                <?php
                if (isset($insert_category)) {
                    echo $insert_category;
                }
                ?>
                <?php
                    $get_category = $category->get_cate_by_ID($id);
                    if($get_category){
                        while($result = $get_category->fetch_assoc()){
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input value="<?php echo $result['category_name']; ?>"class="cate-input" type="text" name="category_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="save-btn btn-block" type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php }
            } ?>
            </div>
    </div>
</div>

<?php
include_once 'components/footer.php'
?>