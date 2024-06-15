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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
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
                <a href="#" class="shopcart">
                    Shopping Cart Total Price : INR <?php echo totalPrice();?>, Total Items: <?php item(); ?>
                </a>
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
    <!-- <br> -->
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
                        <li class="active">
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="shop.php"> SHOP</a>
                        </li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='customer/my_account.php?my_order'>MY ACCOUNT</a>";
                        ?> </li>
                        <li>
                            <a href="cart.php"> SHOPPING CART</a>
                        </li>
                        <li>
                            <a href="about.php"> ABOUT US</a>
                        </li>
                        <li>
                            <a href="services.php"> SERVICES</a>
                        </li>
                        <li>
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



<!-- slider starts -->
    <div class="container" id = "slider">
        <div class="col-md-12">
            <div class="carousel slide" id = "myCarousel" data-ride = "carousel">
                <ol class = "carousel-indicators">
                    <?php
                    $i = 0;
                        $get_slider = "select * from slider";
                        $run_slider = mysqli_query($con, $get_slider); // Corrected function call
                        while($row = mysqli_fetch_array($run_slider)) { // Corrected function name
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<li data-target = '#myCarousel' data-slide-to = '$i'></li>";
                            $i++;
                        }
                    ?>
                    <!-- <li data-target = "#myCarousel" data-slide-to = "0"></li>
                    <li data-target = "#myCarousel" data-slide-to = "1"></li>
                    <li data-target = "#myCarousel" data-slide-to = "2"></li>
                    <li data-target = "#myCarousel" data-slide-to = "3"></li> -->
                </ol>
                <!-- carousel inner start -->
                <div class="carousel-inner">


                    <!-- static -->

                    <!-- <div class="item active">
                        <img src="admin_area/slider_images/img1.png">
                    </div>
                    <div class="item">
                        <img src="admin_area/slider_images/img2.png">
                    </div>
                    <div class="item">
                        <img src="admin_area/slider_images/img3.png">
                    </div>
                    <div class="item">
                        <img src="admin_area/slider_images/img4.png">
                    </div> -->


                    <!-- dynamic -->
                    <?php
                        // First query: Fetch the first slider
                        $get_slider = "SELECT * FROM slider LIMIT 0,1";
                        $run_slider = mysqli_query($con, $get_slider);
                        // while($row = mysqli_fetch_array($run_slider)) {
                        $row = mysqli_fetch_array($run_slider);
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item active'>
                                    <img src='admin_area/slider_images/$slider_image'>
                                </div>";
                        // }
                    ?>

                    <?php
                        $get_slider = "select * from slider LIMIT 1,90";
                        $run_slider = mysqli_query($con, $get_slider); // Corrected function call
                        while($row = mysqli_fetch_array($run_slider)) { // Corrected function name
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item'>
                                    <img src='admin_area/slider_images/$slider_image'>
                                </div>";
                        }
                    ?>


                </div>
                <!-- carousel inner end -->
                <a href="#myCarousel" class = "left carousel-control" data-slide = "prev">
                    <span class = "glyphicon glyphicon-chevron-left"></span>
                    <span class = "sr-only">Previous</span>
                </a>
                <a href="#myCarousel" class = "right carousel-control" data-slide = "next">
                    <span class = "glyphicon glyphicon-chevron-right"></span>
                    <span class = "sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
<!-- slider ends -->



<!--advantages start  -->
<div id = "advantage">
    <div class="container">
        <div class="same-height-row">
            <?php

                $get_boxes = "select * from boxes_section";
                $run_boxes = mysqli_query($con, $get_boxes);
                while($row = mysqli_fetch_array($run_boxes)) {
                    $box_title = $row['box_title'];
                    $box_desc = $row['box_desc'];

            ?>

            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <!-- <i class = "fa fa-heart"></i> -->
                    </div>
                    <h3><a href="#"><?php echo $box_title; ?></a></h3>
                    <p><?php echo $box_desc; ?></p>
                </div>
            </div>

            <?php } ?>



        </div>
    </div>
</div>
<!-- advantages end -->


<!-- <div id = "hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Latest this week</h2>
            </div>
        </div>
    </div>
</div> -->

<!-- product list starts -->
<div id="content" class = "container">
    <div class="row">
        <?php
            getPro();
        ?>
    </div>
</div>

<!-- product list starts -->


<!-- Footer Starts -->
<?php
include("includes/footer.php");
?>
<!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>