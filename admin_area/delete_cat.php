<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['delete_cat'])) {
    $delete_id=$_GET['delete_cat'];
    $delete_pro = "delete from categories where cat_id='$delete_id'";
    $run_q = mysqli_query($con, $delete_pro);
    if($run_q) {
        echo "<script>alert('Category Deleted')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>



<?php } ?>