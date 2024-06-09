<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        
        ?>
<?php

if(isset($_GET['delete_slider'])) {
    $delete_id=$_GET['delete_slider'];
    $delete_pro = "delete from slider where id='$delete_id'";
    $run_q = mysqli_query($con, $delete_pro);
    if($run_q) {
        echo "<script>alert('Slider Deleted')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}

?>



<?php } ?>