<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['order_delete'])) {
    $delete_id=$_GET['order_delete'];
    $delete_pro = "delete from customer_order where order_id='$delete_id'";
    $run_q = mysqli_query($con, $delete_pro);
    if($run_q) {
        echo "<script>alert('Order Deleted')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
}

?>



<?php } ?>