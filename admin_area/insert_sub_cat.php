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
                    Dashboard / Insert Product Sub Category
                </li>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- col-lg-12 starts -->
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                    <i class="fa-solid fa-file-arrow-down"></i> Insert Product Sub Category
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Sub Category</label>
                            <div class="col-md-6">
                                <select name="sub_cat_id" class="form-control" required>
                                    <?php
                                        $id = $_GET['insert_sub_cat'];
                                        $get_cat_name = "SELECT * FROM categories where cat_id = '$id'";
                                        $run_cat_name = mysqli_query($con, $get_cat_name);
                                        $row = mysqli_fetch_array($run_cat_name);
                                        $cat_name = $row['cat_title'];
                                        $get_cat_name = "SELECT * FROM sub_category where cat_name = '$cat_name'";
                                        $run_cat_name = mysqli_query($con, $get_cat_name);
                                        while($row = mysqli_fetch_array($run_cat_name)) {
                                            $newid = $row['sub_cat_id'];
                                            $cat_title = $row['sub_cat_name'];
                                            echo "<option value='$newid'>$cat_title</option>";
                                        }
                                    ?>
                                </select>
                            </div>
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
    $sub_cat_id = $_POST['sub_cat_id'];
    $insert_p_cat = "update products set sub_cat_id = '$sub_cat_id' where sub_cat_id = -1 AND cat_id = '$id'";
    $run_p_cat = mysqli_query($con, $insert_p_cat);
    if($run_p_cat) {
        echo "<script>alert('Sub Category Inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_products', '_self')</script>";
    } 
    else {
        echo "<script>alert('Sub Category Insertion Failed')</script>";
    }
}

?>
<?php } ?>