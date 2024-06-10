<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['customer_delete'])) {
    $delete_id=$_GET['customer_delete'];
    $delete_customer = "delete from customers where customer_id='$delete_id'";
    $run_q = mysqli_query($con, $delete_customer);
    if($run_q) {
        echo "<script>alert('Customer Deleted')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
}

?>
<?php } ?>