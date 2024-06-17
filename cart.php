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
            <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php' class = 'btn btn-success btn'>Welcome Guest</a>";
                            else echo "<a href='customer/my_account.php?my_order' class = 'btn btn-success btn'>Welcome " .$_SESSION['customer_email']."</a>";
                        ?>
            </div>
            <div class="col-md-6">
                <ul class = "menu">
                    <li>
                        <a href="customer_registration.php">New user</a>
                    </li>
                    <li>
                    <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>My Account</a>";
                            else echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
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
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="shop.php">SHOP</a>
                        </li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='customer/my_account.php?my_order'>MY ACCOUNT</a>";
                        ?> 
                        </li>
                        <li class = "active">
                            <a href="cart.php">SHOPPING CART</a>
                        </li>
                        <li>
                            <a href="contactus.php">CONTACT US</a>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>Cart</li>
                </ul>
            </div>
            <!-- colmd12 ends -->
            <!-- colmd9 starts -->

            <div class="col-md-9" id = "cart">
                <div class="box">
                    <form action="cart.php" method = "post" enctype = "multipart-form-data">
                        <h1>Shopping Cart</h1>
                        <?php
                        $ip_add=getUserIP();
                        $select_cart="select * from cart where ip_add='$ip_add'";
                        $run_cart = mysqli_query($con, $select_cart);
                        $count=mysqli_num_rows($run_cart);
                        ?>
                        <p class = "text-muted">Currently <?php echo $count; ?> items in your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan = "2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Specs</th>
                                        <th colspan = "1">Remove</th>
                                        <th colspan = "1">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    while($row = mysqli_fetch_array($run_cart)) {
                                        $pro_id = $row['p_id'];
                                        $pro_size = $row['size'];
                                        $pro_qty = $row['qty'];
                                        $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
                                        $run_pro = mysqli_query($con, $get_product);
                                        while($row_new = mysqli_fetch_array($run_pro)) {
                                            $pro_title = $row_new['product_title'];
                                            $pro_img = $row_new['product_img1'];
                                            $p_price = $row_new['product_price'];
                                            $sub_total = $p_price * $pro_qty;
                                            $total += $sub_total;
                                    ?>
                                    <tr>
                                        <td><img src="admin_area/product_images/<?php echo $pro_img; ?>" alt=""></td>
                                        <td><?php echo $pro_title; ?></td>
                                        <td><?php echo $pro_qty; ?></td>
                                        <td><?php echo $p_price; ?></td>
                                        <td><?php echo $pro_size; ?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                        <td><?php echo $sub_total; ?></td>
                                    </tr>
                                    <?php
                                        } // End of inner while
                                    } // End of outer while
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan = "6">Total</th>
                                        <th><?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- table respnsive ends -->

                        <!-- cart box table footer starts -->
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class = "btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a>
                            </div>
                            <div class="pull-right">
                                <button class = "btn btn-default" type = "submit" name = "update" value = "Update Cart">
                                    <i class = "fa fa-refresh"></i> Update Cart
                                </button>
                                <a href="checkout.php" class = "btn btn-primary">
                                    Proceed to Checkout
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>


                <?php
                function update_cart() {
                    global $con;
                    if(isset($_POST['update'])) {
                        foreach($_POST['remove'] as $remove_id) {
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            $run_del=mysqli_query($con, $delete_product);
                            if($run_del) {
                                echo "
                                <script>window.open('cart.php','_self')</script>
                                ";
                            }
                        }
                    }
                }
                echo @$up_cart=update_cart();
                ?>



                <div id = "row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class = "text-center">
                                You might also like these products
                            </h3>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin_area/product_images/product_b.webp" alt="">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">
                                        Product_this
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin_area/product_images/product_b.webp" alt="">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">
                                        Product_this
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin_area/product_images/product_b.webp" alt="">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">
                                        Product_this
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- colmd9ends -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    <p class="tex-muted">
                        Shipping and additional costs are calculated based on the values you have entered.
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <td><?php echo $total?></td>
                                </tr>
                                <tr>
                                    <td>Shipping and Handling</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><?php echo $total?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
