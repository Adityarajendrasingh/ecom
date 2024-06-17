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
                <i class="fa fa-dashboard"></i> Dashboard / Insert Sub Category
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

                    </i> Insert Sub Category
                </h3>
            </div>

            <div class="panel-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sub Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="sub_cat_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Parent Category</label>
                       <div class="col-md-6">
                            <select name="cat_title" id="" class="form-control">
                                <?php
                                $find_cat = "select * from categories";
                                $run_cat = mysqli_query($con, $find_cat);
                                $i = 1;
                                while($row = mysqli_fetch_array($run_cat)) {
                                    $cat_name = $row['cat_title'];
                                    echo "<option value=$i>$cat_name</option>";
                                    $i++;
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sub Category Description</label>
                       <div class="col-md-6">
                            <textarea name="sub_cat_desc" type = "text" cols="19" rows="6" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input value="Submit Now" type="submit" name="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])) {
    $sub_cat_title = $_POST['sub_cat_title'];
    $cat_title = $_POST['cat_title'];
    $sub_cat_desc = $_POST['sub_cat_desc'];
    $insert_p_cat = "insert into sub_category (sub_cat_name, cat_name, sub_cat_desc) values('$sub_cat_title','$cat_title','$sub_cat_desc')";
    $run_p_cat = mysqli_query($con, $insert_p_cat);
    if($run_p_cat) {
        echo "<script>alert('Sub Category Inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_p_cats', '_self')</script>";
    } 
    else {
        echo "<script>alert('Sub Category Insertion Failed')</script>";
    }
}

?>
<?php } ?>