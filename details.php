<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['pro_id'])) {
    $pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);
    $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];
    $p_title = $row_product['product_title'];
    $p_price = $row_product['product_price'];
    $p_desc = $row_product['product_desc'];
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];

    $get_p_cat = "SELECT * FROM product_category WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- top bar -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn"><?php
                        if(!isset($_SESSION['customer_email'])) echo "Welcome Guest";
                        else echo "Welcome " .$_SESSION['customer_email']."";
                    ?></a>
                <a href="#">Shopping Cart Total Price : INR <?php echo totalPrice();?>, Total Items: <?php item(); ?></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_registration.php">New user</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <!-- navbar header end -->
            <!-- navbar collapse menu start -->
            <div class="navbar-collapse" id="navigation">
                <!-- padding nav starts -->
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">HOME</a></li>
                        <li class="active"><a href="shop.php">SHOP</a></li>
                        <li><a href="customer/my_account.php">MY ACCOUNT</a></li>
                        <li><a href="cart.php">SHOPPING CART</a></li>
                        <li><a href="about.php">ABOUT US</a></li>
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="contactus.php">CONTACT US</a></li>
                    </ul>
                </div>
                <!-- padding nav ends -->
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items in cart</span>
                </a>
                <!-- navbar collapse right starts -->
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- navbar collapse right ends -->
                <div class="collapse clearfix" id="search">
                    <form action="result.php" class="navbar-form" method="get">
                        <div class="input-group">
                            <input type="text" name="user-query" placeholder="Search" class="form-control" required="">
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- navbar collapse menu end-->
        </div>
    </div>
    <!-- navbar ends -->

<div id="content">
    <!-- container start -->
    <div class="container">
        <!-- col-md-12 start -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
                <li><?php echo $p_title; ?></li>
            </ul>
        </div>
        <!-- col-md-12 ends -->

        <!-- col-md-3 starts -->
        <div class="col-md-3">
            <?php include("includes/sidebar.php"); ?>
        </div>
        <!-- col-md-3 ends -->

        <div class="col-md-9">
            <div class="row" id="productmain">
                <!-- col-sm-6 starts -->
                <div class="col-sm-6">
                    <div id="mainimage">
                        <div class="carousel slide" id="mycarousel" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#mycarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- carousel inner starts -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img src="admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive" alt="">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img src="admin_area/product_images/<?php echo $p_img2; ?>" class="img-responsive" alt="">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img src="admin_area/product_images/<?php echo $p_img3; ?>" class="img-responsive" alt="">
                                    </center>
                                </div>
                            </div>
                            <!-- carousel inner ends -->
                            <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- col-sm-6 ends -->
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?php echo $p_title; ?></h1>
                        <?php addCart(); ?>
                        <form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
                            <!-- form group starts -->
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Quantity</label>
                                <!-- col-md-7 starts -->
                                <div class="col-md-7">
                                    <select name="product_qty" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <!-- col-md-7 ends -->
                            </div>
                            <!-- form group ends -->
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Specs</label>
                                <div class="col-md-7">
                                    <select name="product_size" id="" class="form-control">
                                        <option value="spec_1">spec_1</option>
                                        <option value="spec_2">spec_2</option>
                                        <option value="spec_3">spec_3</option>
                                        <option value="spec_4">spec_4</option>
                                        <option value="spec_5">spec_5</option>
                                    </select>
                                </div>
                            </div>
                            <p class="price"><?php echo $p_price; ?></p>
                            <p class="text-center buttons">
                                <button class="btn btn-primary">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </button>
                            </p>
                        </form>
                    </div>
                    <!-- box ends -->
                    <div class="col-xs-4">
                        <a href="#" id="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img1; ?>" alt="">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" id="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img2; ?>" alt="">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" id="thumb">
                            <img src="admin_area/product_images/<?php echo $p_img3; ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- row ends -->
            <div class="box" id="details">
                <h4>Product Details</h4>
                <p><?php echo $p_desc; ?></p>
            </div>
            <div id="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">You might also like these products</h3>
                    </div>
                </div>
                <?php
                $get_query = "SELECT * FROM products ORDER BY 1 LIMIT 0, 3";
                $run_product = mysqli_query($con, $get_query);
                while($row = mysqli_fetch_array($run_product)) {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_img1 = $row['product_img1'];
                    echo "
                    <div class='center-responsive col-md-3 col-sm-6'>
                        <div class='product same-height'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                <p class='price'>$pro_price</p>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- container ends -->
</div>
<!-- content ends -->
<!-- Footer Starts -->
<?php include("includes/footer.php"); ?>
<!-- Footer ends -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
