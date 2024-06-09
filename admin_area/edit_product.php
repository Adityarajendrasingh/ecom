<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
    ?>

<?php

if(isset($_GET['edit_product'])) {
    $edit_id=$_GET['edit_product'];
    $get_p = "select * from products where product_id='$edit_id'";
    $run_edit = mysqli_query ($con, $get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_id = $row_edit['product_id'];
    $p_title = $row_edit['product_title'];
    $p_cat = $row_edit['p_cat_id'];
    $cat = $row_edit['cat_id'];
    $p_image1 = $row_edit['product_img1'];
    $p_image2 = $row_edit['product_img2'];
    $p_image3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keywords'];

}

$get_p_cat = "select * from product_category where p_cat_id='$p_cat'";
$run_p_cat = mysqli_query($con, $get_p_cat);
$row_p_cat = mysqli_fetch_array($run_p_cat);
$p_cat_title = $row_p_cat['p_cat_title'];
$get_cat = "select * from categories where cat_id='$cat'";
$run_cat = mysqli_query($con, $get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$cat_title = $row_cat['cat_title'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce Website</title>
    <!-- bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <!-- row starts -->
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard/Edit Product
                </li>
            </div>
        </div>
    </div>
    <!-- row ends -->

    <!-- rowstarts -->
    <div class="row">
        <!-- col-lg-12 starts -->
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <i class="fa fa-money"></i>Edit Product 
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title</label>
                            <input type="text" class="form-control" name="product_title" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category</label>
                            <select name="product_cat" class="form-control" required>
                                <option value="">Select a product category</option>
                                <?php
                                    $get_p_cats="SELECT * FROM product_category";
                                    $run_p_cats=mysqli_query($con, $get_p_cats);
                                    while($row = mysqli_fetch_array($run_p_cats)) {
                                        $id = $row['p_cat_id'];
                                        $cat_title = $row['p_cat_title'];
                                        echo "<option value='$id'>$cat_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Categories</label>
                            <select name="cat" class="form-control" required>
                                <option value="">Select a category</option>
                                <?php
                                    $get_cats = "SELECT * FROM categories";
                                    $run_cats = mysqli_query($con, $get_cats);
                                    while($row = mysqli_fetch_array($run_cats)) {
                                        $id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<option value='$id'>$cat_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1</label>
                            <input type="file" class="form-control" name="product_img1" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2</label>
                            <input type="file" class="form-control" name="product_img2" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3</label>
                            <input type="file" class="form-control" name="product_img3" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price</label>
                            <input type="text" class="form-control" name="product_price" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keywords</label>
                            <input type="text" class="form-control" name="product_keywords" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description</label>
                            <textarea name="product_desc" id="" cols="19" rows="6" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- col-lg-12 ends -->
        <div class="col-lg-3"></div>
    </div>

    <?php
    if(isset($_POST['submit'])) { // Check if the form is submitted
        $product_title = mysqli_real_escape_string($con, $_POST['product_title']); // Sanitize input
        $product_cat = mysqli_real_escape_string($con, $_POST['product_cat']); // Sanitize input
        $cat = mysqli_real_escape_string($con, $_POST['cat']); // Sanitize input
        $product_price = mysqli_real_escape_string($con, $_POST['product_price']); // Sanitize input
        $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']); // Sanitize input
        $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']); // Sanitize input

        // Handle file uploads
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        // Move uploaded files to the product_images directory
        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");

        // update product data into the database
        $update_product = "update products set p_cat_id='$product_cat', cat_id='$cat' ,date=NOW(), product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2',product_img3='$product_img3', product_price='$product_price',product_desc='$product_desc', product_keywords='$product_keywords' where product_id='$p_id'";
        $run_product = mysqli_query($con, $update_product);

        if($run_product) {
            echo "<script>alert('Product Edited Successfully')</script>";
            echo "<script>window.open('index.php?view_products', '_self')</script>";
        } else {
            echo "<script>alert('Product Edit Failed')</script>";
        }
    }
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>