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
                <i class="fa fa-dashboard"></i> Dashboard / Insert Box
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

                    </i> Insert Box
                </h3>
            </div>

            <div class="panel-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Box Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="box_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Box Description</label>
                       <div class="col-md-6">
                            <textarea name="box_desc" type = "text" cols="19" rows="6" class="form-control" required></textarea>
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
    $box_title = $_POST['box_title'];
    $box_desc = $_POST['box_desc'];
    $insert_box = "insert into boxes_section (box_title, box_desc) values('$box_title','$box_desc')";
    $run_box = mysqli_query($con, $insert_box);
    if($run_box) {
        echo "<script>alert('Box Inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_box', '_self')</script>";
    } else {
        echo "<script>alert('Box Insertion Failed')</script>";
    }
}

?>
<?php } ?>