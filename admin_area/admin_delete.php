<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['admin_delete'])) {
    $delete_id=$_GET['admin_delete'];
    $delete_admin = "delete from admins where admin_id='$delete_id'";
    $run_q = mysqli_query($con, $delete_admin);
    if($run_q) {
        echo "<script>alert('Admin Deleted')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}

?>
<?php } ?>