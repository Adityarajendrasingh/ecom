<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['delete_box'])) {
    $delete_id=$_GET['delete_box'];
    $delete_box = "delete from boxes_section where box_id='$delete_id'";
    $run_q = mysqli_query($con, $delete_box);
    if($run_q) {
        echo "<script>alert('Box Deleted')</script>";
        echo "<script>window.open('index.php?view_box','_self')</script>";
    }
}

?>



<?php } ?>