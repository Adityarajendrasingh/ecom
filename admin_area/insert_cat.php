<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}


else {



    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Insert Category
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h3 class="panel-title">
                <i class="fa-solid fa-file-arrow-down">

                    </i> Insert Category
                </h3>
            </div>

            <div class="panel-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Description</label>
                       <div class="col-md-6">
                            <textarea name="cat_desc" type = "text" cols="19" rows="6" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input value="Insert Now" type="submit" name="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
    $insert_cat = "insert into categories (cat_title,cat_desc) values('$cat_title','$cat_desc')";
    $run_cat = mysqli_query($con, $insert_cat);
    if($run_cat) {
        echo "<script>alert('Category Inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_cats', '_self')</script>";
    } else {
        echo "<script>alert('Category Insertion Failed')</script>";
    }
}

?>
<?php } ?>