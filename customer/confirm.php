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
                <a href="#" class = "btn btn-success btn">
                <?php
                        if(!isset($_SESSION['customer_email'])) echo "Welcome Guest";
                        else echo "Welcome " .$_SESSION['customer_email']."";
                    ?>
                </a>
                <a href="#">
                    Shopping Cart Total Price : IN 100, Total Items: 2
                </a>
            </div>
            <div class="col-md-6">
                <ul class = "menu">
                    <li>
                        <a href="../customer_registration.php">New user
                        </a>
                    </li>
                    <li>
                        <a href="../checkout.php"> Checkout
                        </a>
                    </li>
                    <li>
                        <a href="../cart.php"> Cart
                        </a>
                    </li>
                    <li>
                        <a href="../login.php">Login
                        </a>
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
                        <li>
                            <a href="../index.php">HOME</a>
                        </li>
                        <li>
                            <a href="../shop.php"> SHOP</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php"> MY ACCOUNT</a>
                        </li>
                        <li>
                            <a href="../cart.php"> SHOPPING CART</a>
                        </li>
                        <li>
                            <a href="../about.php"> ABOUT US</a>
                        </li>
                        <li>
                            <a href="../services.php"> SERVICES</a>
                        </li>
                        <li>
                            <a href="../contactus.php"> CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <!-- padding nav ends -->
                <a href="cart.php" class = "btn btn-primary navbar-btn right">
                    <i class = "fa fa-shopping-cart"></i>
                    <span>$ items in cart</span>
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
                    <a href="home.php">Home</a>
                </li>
                <li>My Account</li>
            </ul>
        </div>
        <!-- colmd12 ends -->

        <!--colmd3 starts  -->
        <div class="col-md-3">
            <?php
            include("includes/sidebar.php");
            ?>
        </div>
        <!-- colmd3ends -->

        <div class="col-md-9">
            <div class="box">
                <h1 align = "center">Please Confirm Payment</h1>
                <form action="confirm.php" method = "post" enctype = "multipart/form-data">
                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text" name="invoice_number" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Transaction Number</label>
                        <input type="text" name="transaction_number" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" name="amount" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment Mode</label>
                        <select name="payment_mode" class="form-control" id="">
                            <option value="">Select</option>
                            <option value="">Net Banking</option>
                            <option value="">Card</option>
                            <option value="">UPI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Payment Date</label>
                        <input type="date" name="date" class = "form-control" required="">
                    </div>
                    <div class="text-center">
                        <button type = "submit" name = "confirm_payment" class="btn btn-primary btn-lg">Confirm</button>
                    </div>
                </form>
            </div>
        </div>


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