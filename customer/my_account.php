<?php
session_start();
if(!isset($_GET['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
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
                    Shopping Cart Total Price : INR <?php echo totalPrice();?>, Total Items: <?php item(); ?>
                </a>
            </div>
            <div class="col-md-6">
                <ul class = "menu">
                    <li>
                        <a href="../customer_registration.php">New user
                        </a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='../checkout.php'>My Account</a>";
                            else echo "<a href='my_account.php?my_order'>My Account</a>";
                        ?> 
                    </li>
                    <li>
                        <a href="../cart.php"> Cart
                        </a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='../checkout.php'>Login</a>";
                            else echo "<a href='../logout.php'>Logout</a>";
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
                        <li>
                            <a href="../index.php">HOME</a>
                        </li>
                        <li>
                            <a href="../shop.php"> SHOP</a>
                        </li>
                        <li class="active">
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='../checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='my_account.php?my_order'>MY ACCOUNT</a>";
                        ?></li>
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
                    <span><?php item(); ?> items in cart</span>
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
            <!-- include my_oreders -->
            <?php
            if(isset($_GET['my_order'])) {
                include("my_order.php");
            }
            ?>

            <!-- pay_offline -->
            <?php
                if(isset($_GET['pay_offline'])) {
                    include("pay_offline.php");
                }

            ?>
            <!-- edit_account -->
            <?php
                if(isset($_GET['edit_act'])) {
                    include("edit_act.php");
                }
            ?>
            <!--change_account -->
            <?php
                if(isset($_GET['change_pswd'])) {
                    include("change_password.php");
                }
            ?>
            <!-- delete account -->
            <?php
                if(isset($_GET['delete_ac'])) {
                    include("delete_ac.php");
                }
            ?>
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
<?php } ?>