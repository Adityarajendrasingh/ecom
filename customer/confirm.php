<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
    include("includes/db.php");
    include("functions/functions.php");
    if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    }
}
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
                            if(!isset($_SESSION['customer_email'])) echo "<a href='../checkout.php' class = 'btn btn-success btn'>Welcome Guest</a>";
                            else echo "<a href='my_account.php?my_order' class = 'btn btn-success btn'>Welcome " .$_SESSION['customer_email']."</a>";
                        ?>
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
                        ?>
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
                <form action="confirm.php?update_id=<?php echo $order_id; ?>" method = "post" enctype = "multipart/form-data">
                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text" name="invoice_number" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" name="amount" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment Mode</label>
                        <select name="payment_mode" class="form-control" id="">
                            <option value="">Select</option>
                            <option value="">Paypal</option>
                            <option value="">Card</option>
                            <option value="">UPI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Transaction Number</label>
                        <input type="text" name="trfr_number" class = "form-control" id="" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment Date</label>
                        <input type="date" name="date" class = "form-control" required="">
                    </div>
                    <div class="text-center">
                        <button name = "confirm_payment" class="btn btn-primary btn-lg" method = "post">Confirm</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['confirm_payment'])) {
                        $update_id = $_GET['update_id'];
                        $invoice_number = $_POST['invoice_number'];
                        $amount = $_POST['amount'];
                        $payment_mode = $_POST['payment_mode'];
                        $trfr_number = $_POST['trfr_number'];
                        $date = $_POST['date'];
                        $complete = "Complete";
                        $code=mt_rand();

                        // $insert = "INSERT INTO payments (invoice_id,amount,payment_mode,ref_no,code,payment_date) VALUES ('$invoice_number','$amount','$payment_mode','$trfr_number','$code','$date')";
                        // $run_insert = mysqli_query($con, $insert);
                        $update_q = "UPDATE customer_order SET order_status = '$complete' WHERE order_id = '$update_id'";
                        $run_update_q = mysqli_query($con, $update_q);
                        echo "<script>alert('Thank You! for purchasing, your orders will be completed within 24 hours')</script>";
                        echo "<script>window.open('my_account.php?my_order','_self')</script>";
                     
                    }
                ?>

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