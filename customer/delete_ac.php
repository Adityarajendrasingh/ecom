<div class="box">
    <center>
        <h1>
            Do you reaaly want to delete your account
        </h1>
        <form action="" method="post">
            <input type="submit" name="yes" value="Yes delete" class="btn btn-danger">
            <input type="submit" name="no" value="No" class="btn btn-primary">     
        </form>
    </center>
</div>

<?php

$c_email=$_SESSION['customer_email'];
if(isset($_POST['yes'])) {
    $q = "delete from customers where customer_email='$c_email'";
    $run_q = mysqli_query($con, $q);
    if($run_q) {
        session_destroy();
        echo "<script>alert('Account Deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>