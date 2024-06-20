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
                        <li>
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
                        <li class = "active">
                            <a href="contactus.php"> CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <!-- padding nav ends -->
                <a href="cart.php" class = "btn btn-primary navbar-btn right">
                    <i class = "fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items in cart</span>
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
        <div class="container">
            <!-- colmd12 start -->
            <div class="col-md-12">
                <ul class = "breadcrumb">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <!-- colmd12 ends -->

            <!--colmd3 starts  -->
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>

            <!-- colmd 9 start -->

            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Contact Us</h2>
                            <p class = "text-muted">
                                If you have any questions, please feel free to contact us, our customer service is working for you 24/7.
                            </p>
                        </center>
                    </div>
                    <br>
                    <br>
                    <form action="contactus.php" method = "post" class="">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required = "" class = "form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="" class = "form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="submit" id="" class = "form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" ></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class = "btn btn-primary">
                            <i class="fa fa-user-md"></i> Send Message</button>
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
// admin mail
    if(isset($_POST['submit'])) {
        $senderName=$_POST['name'];
        $senderEmail=$_POST['email'];
        $senderSubject=$_POST['subject'];
        $senderMessage=$_POST['message'];
        $receiverEmail = "adi.rajendra@gmail.com";
        mail($receiverEmail, $senderName, $senderSubject, $senderMessage, $senderEmail);
        // customer mail
        $email = $_POST['email'];
        $subject=$_POST['subject'];
        $msg="I shall get to you soon, thanks for contacting us";
        $from="adi.rajendra@gmail.com";
        mail($email, $subject, $msg, $from);
        echo "<h2 align = 'center'>Your mail has been sent successfully</h>";
    }

?>