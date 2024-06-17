<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce Website</title>
    <!-- bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body>
    <!-- top bar -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
            <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php' class = 'btn btn-success btn'>Welcome Guest</a>";
                            else echo "<a href='customer/my_account.php?my_order' class = 'btn btn-success btn'>Welcome " .$_SESSION['customer_email']."</a>";
                        ?>
            </div>
            <div class="col-md-6">
                <ul class = "menu">
                    <li>
                        <a href="customer_registration.php">New user
                        </a>
                    </li>
                    <li>
                    <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>My Account</a>";
                            else echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                        ?>
                    </li>
                    <li>
                        <a href="cart.php"> Cart
                        </a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>Login</a>";
                            else echo "<a href='logout.php'>Logout</a>";
                        ?>    
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- top bar ends -->
    <div class="navbar navbar-default" id = "navbar">
        <div class="container">
            <!-- navbar header start -->
            <div class="navbar-header">
                <a href="index.php" class = "navbar-brand home">
                    <img src="images/logo.png" alt="teehosting" class= "hidden-xs">
                    <img src="images/logos.png" alt="teehosting" class= "visible-xs">
                </a>
                <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class = "fa fa-align-justify"></i>
                </button>
                <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#search">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class = "fa fa-search"></i>
                </button>
            </div>
            <!-- navbar header end -->
            <!-- navbar collaps menu start -->
            <div class="navbar-collapse" id = "navigation">
                <!-- padding nav starts -->
                <div class="padding-nav">
                    <ul class = "nav navbar-nav navbar-left">
                        <li class = "active">
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="shop.php"> SHOP</a>
                        </li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='customer/my_account.php?my_order'>MY ACCOUNT</a>";
                        ?>
                        </li>
                        <li>
                            <a href="cart.php"> SHOPPING CART</a>
                        </li>
                        <li class>
                            <a href="contactus.php"> CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <!-- padding nav ends -->
                <a href="cart.php" class = "btn btn-primary navbar-btn right">
                    <i class = "fa fa-shopping-cart"></i>
                    <span><?php echo item(); ?> items in cart</span>
                </a>
                <!-- navbar collapse right starts -->
                <div class="navbar-collapse collapse right">
                    <button class = "btn navbar-btn btn-primary" type = "button" data-toggle = "collapse" data-target = "#search">
                        <span class = "sr-only">Toggle Search</span>
                        <i class = "fa fa-search"></i>
                    </button>
                </div>
                <!-- navbar collapse right ends -->
                <!--  -->
                <div class="collapse clearfix" id ="search">
                    <form action="result.php" class="navbar-form" method = "get">
                        <div class="input-group">
                            <input type="text" name = "user-query" placeholder = "Search" class = "form-control" required = "">
                            <span class = "input-group-btn">
                                <button type = "submit" value = "Search" name = "search" class = "btn btn-primary">
                                    <i class = "fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- navbar collaps menu end-->
        </div>
    </div>
    <!-- navbar ends -->


    <div id = "content">
        <!-- container start -->
        <div class="container">
            <!-- colmd12 start -->
            <div class="col-md-12">
                <ul class = "breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>Registertion</li>
                </ul>
            </div>
            <!-- colmd12 ends -->

            <!--colmd3 starts  -->

            <!-- colmd 9 start -->

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>New User Registration</h2>
                        </center>
                    </div>
                    <br>
                    <br>
                    <form action="customer_registration.php" method = "POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="c_name" required = "" class = "form-control">
                        </div>
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="text" name="c_email" id="" class = "form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Customer Password</label>
                            <input type="password" name="c_password" id="" class = "form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="c_country" id="" class = "form-control" required="">
                        
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="c_city" id="" class = "form-control" required="">
                        
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="c_contact" id="" class = "form-control" required="">
                        
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="c_address" id="" class = "form-control" required="">
                        
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="FileID" name="c_image" id="" class = "form-control" required="">
                        
                        </div>
                        <div class="text-center">
                            <button type="submit" class = "btn btn-primary" name="submit">
                            <i class="fa fa-user-md"></i> Register</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        <!-- colmd9 ends -->
        </div>
        <!-- container ends -->
    </div>


<!-- Footer Starts -->
<?php
include("includes/footer.php");
?>
<!-- Footer ends -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $check_cust = "select * from customers where customer_email = '$c_email'";
    $run_check_cust = mysqli_query($con, $check_cust);
    $row = mysqli_num_rows($run_check_cust);
    if($row > 0) {
        echo "<script>alert('This email already exists')</script>";
        echo "<script>window.open('customer_registration.php','_self')</script>";
    }
    else {
        $c_password=$_POST['c_password'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_tmp_image=$_FILES['c_image']['tmp_name']; 
        $c_ip = getUserIP();
        $verify_token = md5(rand());

        move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
        $insert_customer = "insert into customers (customer_name, customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
        $run_customer=mysqli_query($con, $insert_customer);




        $sel_cart="select * from cart where ip_add='$c_ip'";
        $run_cart=mysqli_query($con, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if($check_cart > 0) {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registered successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        else {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registered successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        }
    }
}
?>