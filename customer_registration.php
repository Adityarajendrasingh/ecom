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
                <!-- navbar collapse right ends -->
                <!--  -->
            </div>
            <!-- navbar collaps menu end-->
        </div>
    </div>
    <!-- navbar ends -->


    <div id = "content">
        <!-- container start -->
        <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>New User Registration</h4>
            </div>
            <div class="card-body">

            <form action="sendmail.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="c_name" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Customer Email</label>
                    <input type="email" name="c_email" class="form-control" required="">
                </div>
                <div class="form-group" style="position: relative;">
                    <label for="password">Customer Password</label>
                    <input type="password" name="c_password" id="cust_password" class="form-control" required="" style="padding-right: 40px;">
                    <div class="far fa-eye" onclick="
        const password = document.getElementById('cust_password');
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        const toggleIcon = document.getElementById('togglePassword');
        toggleIcon.classList.toggle('fa-eye-slash');" style="position: absolute; right: 10px; top: 34px; cursor: pointer;"></div>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="c_country" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="c_city" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="c_contact" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="c_address" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" id="FileID" name="c_image" class="form-control" required="">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit-customer-form">
                        <i class="fa fa-user-md"></i> Register
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- container ends -->
    </div>


<!-- Footer Starts -->
<?php
include("includes/footer.php");
?>
<!-- Footer ends -->
 <script>

 </script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>