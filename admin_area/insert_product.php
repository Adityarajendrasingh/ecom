<?php
session_start();
include("includes/db.php");

if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <!-- row starts -->
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert Product
                </li>
            </div>
        </div>
    </div>
    <!-- row ends -->

    <!-- row starts -->
    <div class="row">
        <!-- col-lg-12 starts -->
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                    <i class="fa-solid fa-file-arrow-down"></i> Insert Product
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title</label>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_title" required></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Category</label>
                            <div class="col-md-6">
                                <select name="cat" class="form-control" required>
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
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2</label>
                            <div class="col-md-6"><input type="file" class="form-control" name="product_img2" required></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3</label>
                            <div class="col-md-6"><input type="file" class="form-control" name="product_img3" required></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_price" required></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keywords</label>
                            <div class="col-md-6"><input type="text" class="form-control" name="product_keywords" required></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6"><textarea name="product_desc" id="" cols="19" rows="6" class="form-control" required></textarea></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- col-lg-12 ends -->
        <div class="col-lg-1"></div>
    </div>

    <?php
    if(isset($_POST['submit'])) {
        $admin_email = $_SESSION['admin_email'];
        $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
        $product_cat = mysqli_real_escape_string($con, $_POST['cat']);
        $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
        $product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);
        $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
        
        // Handle file uploads
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        // Ensure files are uploaded before moving
        if(move_uploaded_file($temp_name1, "product_images/$product_img1") && 
           move_uploaded_file($temp_name2, "product_images/$product_img2") && 
           move_uploaded_file($temp_name3, "product_images/$product_img3")) {
            // Insert product data into the database
            $insert_product = "INSERT INTO products (sub_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keywords, admin_id)
                               VALUES (-1, '$product_cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keywords', (SELECT admin_id FROM admins WHERE admin_email = '$admin_email'))";

            $run_product = mysqli_query($con, $insert_product);
            if($run_product) {
                echo "<script>alert('Product Inserted Successfully')</script>";
                echo "<script>window.open('index.php?view_products', '_self')</script>";

            } else {
                echo "<script>alert('Product Insertion Failed')</script>";
            }
        } else {
            echo "<script>alert('File upload failed. Please try again.')</script>";
        }
    }
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php } ?>
