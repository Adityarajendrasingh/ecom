
<?php

session_start();
include("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <form action="" class="form-login" method="post"><!-- form begin -->
		<h2 class="form-login-heading"> Admin Login </h2>
		<input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
		<input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
			Login
		</button>
        <h4 class="forgot-password">
            <a href="forgot_password.php">Lost your password?</a>
        </h4>
        <h4 class="new-user">
            <a href="new_register.php">New? Register</a>
        </h4>
	</form><!-- form finish -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['admin_login'])) {
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($con, $_POST['admin_pass']);
    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_password'";
    $run_admin=mysqli_query($con, $get_admin);
    $count = mysqli_num_rows($run_admin);
    if($count == 1) {
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('Successfully Logged In')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
        
        }
    else {
        echo "<script>alert('Email/Password Invalid')</script>";

    }
}

?>