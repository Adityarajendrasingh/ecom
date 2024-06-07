 <div class="box">
    <div class="box-header">
        <center>
            <h2>Login</h2>
            <p class="lead">
                Already our customer
            </p>
        </center>
    </div>
    <br>
    <br>
    <form action="checkout.php" method="post">
        <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" name= "c_email" required="">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name= "c_password" required="">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name = "login" value="Login">
                <i class="fa fa-sign-in"></i> Log in
            </button>
        </div>
    </form>
    <center>
        <a href="customer_registration.php">
            <h4>New? Register Now</h4>
        </a>
    </center>
 </div>


 <?php
if(isset($_POST['login'])) {
    $customer_email=$_POST['c_email'];
    $customer_password=$_POST['c_password'];
    $select_customers="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_password'";
    $run_customers=mysqli_query($con, $select_customers);
    $get_ip = getUserIP();
    $check_customer=mysqli_num_rows($run_customers);
    $select_cart="select* from cart where ip_add='$get_ip'";
    $run_cart=mysqli_query($con, $select_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_customer == 0) {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
    else if($check_customer == 1 && $check_cart == 0) {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Successfully Logged In')</script>";
        echo "<script>window.location.href = 'customer/my_account.php';</script>";
    }
    else {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Successfully Logged In')</script>";
        echo "<script>window.location.href = 'checkout.php';</script>";
    }
}
 
 ?>