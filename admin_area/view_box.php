<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<!-- /row 1 starts -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
            </li>
        </ol>
    </div>
</div>
<!-- row 1 ends -->
 <!-- row 2 starts-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Boxes
                </h3>
            </div>
            <div class="panel-body">

            <?php

                $get_boxes = "select * from boxes_section";
                $run_boxes = mysqli_query($con, $get_boxes);
                while($row = mysqli_fetch_array($run_boxes)) {
                    $box_id = $row['box_id'];
                    $box_title = $row['box_title'];
                    $box_desc = $row['box_desc'];

                ?>

                <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title" align ="center"><?php echo $box_title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $box_desc; ?></p>
                    </div>
                    <div class="panel-footer">
                        <a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-left">
                            <i class="fa fa-trash"></i>Delete
                        </a>
                        <a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-right">
                            <i class="fa fa-pencil"></i>Edit
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </div>

            <?php } ?>
            </div>
            
        </div>
    </div>
</div>
<!-- row 2 ends -->

<?php } ?>