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
    <link rel="stylesheet" href="styles/extra.css">
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
    <!-- <br> -->

    <img class="bg-img" src="images/background.jpg" alt="">
    <!-- top bar ends -->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <!-- navbar header start -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="images/logo.png" alt="teehosting" class="hidden-xs">
                    <img src="images/logos.png" alt="teehosting" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
            </div>
            <!-- navbar header end -->
            <!-- navbar collapse menu start -->
            <div class="navbar-collapse collapse" id="navigation">
                <!-- padding nav starts -->
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="shop.php">SHOP</a>
                        </li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='customer/my_account.php?my_order'>MY ACCOUNT</a>";
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">SHOPPING CART</a>
                        </li>
                        <li>
                            <a href="contactus.php">CONTACT US</a>
                        </li>
                    </ul>
                </div>
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items in cart</span>
                </a>
            </div>

            <!-- navbar collapse menu end -->
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
                </ol>
                <!-- carousel inner start -->
                <div class="carousel-inner">

                    <?php
                        $get_slider = "SELECT * FROM slider LIMIT 0,1";
                        $run_slider = mysqli_query($con, $get_slider);
                        while($row = mysqli_fetch_array($run_slider)) {
                            $row = mysqli_fetch_array($run_slider);
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item active' id ='carousel_img$i'>
                                    <img src='admin_area/slider_images/$slider_image' style='max-width: 100%;height: auto;'>
                                </div>";
                        }
                    ?>

                    <?php
                        $get_slider = "select * from slider LIMIT 1,90";
                        $run_slider = mysqli_query($con, $get_slider); // Corrected function call
                        while($row = mysqli_fetch_array($run_slider)) { // Corrected function name
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item'>
                                    <img src='admin_area/slider_images/$slider_image' style='max-width: 100%;height: auto;'>
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
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="images/background.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>
  </div>
  <div class="b-example-divider"></div>
  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Border hero with cropped image and shadows</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="images/background.jpg" alt="" width="720">
      </div>
    </div>
  </div>
  <div class="b-example-divider"></div>
<!-- Footer Starts -->
<?php
include("includes/footer.php");
?>
<!-- Footer ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
</body>
</html>