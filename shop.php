<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
// include("show_sub_cat_list.php");
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Bootstrap, jQuery, and other includes -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   

    <title>E Commerce Website</title>
    <!-- bootstrap library -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- <script src="js/live_search.js"></script> -->
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
    <!-- top bar ends -->
    <div class="navbar navbar-default" id = "navbar">
        <div class="container">
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
                <div class="padding-nav">
                    <ul class = "nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li class="active">
                            <a href="shop.php"> SHOP</a>
                        </li>
                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>MY ACCOUNT</a>";
                            else echo "<a href='customer/my_account.php?my_order'>MY ACCOUNT</a>";
                        ?></li>
                        <li>
                            <a href="cart.php"> SHOPPING CART</a>
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
                    <div action="" class="navbar-form" method = "get">
                        <div class="input-group">
                            <input type="text" name = "user-query" placeholder = "Search" class = "form-control" required = "" id="search-text">
                            <span class = "input-group-btn">
                                <button name = "search" class = "btn btn-primary" id="live-search">
                                    <i class = "fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
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
                <li>Shop</li>
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
<!-- colmd9 starts -->
        <div class="col-md-9">

            <?php
                if(!isset($_GET['p_cat']) && !isset($_GET['cat_id'])) {
                echo "
                <div class='box'>
                    <h1>Welcome to the Shop!</h1>
                    <p>Browse our categories or products using the navigation menu.</p>
                </div>";
                }
            ?>


        <!--box ends  -->
            <div class="row" id = "products_list_filter">
            <?php
                $per_page = 6;
                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    $query = "SELECT * FROM products";
                    $results = mysqli_query($con, $query);

                    if ($results && mysqli_num_rows($results) > 0) {
                        foreach ($results as $row) {
                            $pro_id = $row['product_id'];
                            $pro_img1 = $row['product_img1'];
                            $pro_title = $row['product_title'];
                            $pro_price = $row['product_price'];
                            ?>

                            <div class='col-md-4 col-sm-6 center-responsive' id='responsiveproducts'>
                                <div class='product'>
                                    <a href='details.php?pro_id=<?php echo $pro_id; ?>'>
                                        <img src='admin_area/product_images/<?php echo $pro_img1; ?>' class='img-responsive' alt='<?php echo $pro_title; ?>'>
                                    </a>
                                    <div class='text'>
                                        <h3>
                                            <a href='details.php?pro_id=<?php echo $pro_id; ?>'><?php echo $pro_title; ?></a>
                                        </h3>
                                        <p class='price'>
                                            INR <?php echo $pro_price; ?>
                                        </p>
                                        <p class='buttons'>
                                            <a href='details.php?pro_id=<?php echo $pro_id; ?>' class='btn btn-default'>View Details</a>
                                            <a href='details.php?pro_id=<?php echo $pro_id; ?>' class='btn btn-primary'>
                                                <i class='fa fa-shopping-cart'></i> Add to cart
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php
                    }
                }
                }
                ?>
                

<?php





                // if (!isset($_GET['p_cat']) && !isset($_GET['cat_id'])) {

                //     if (isset($_GET['page'])) {
                //         $page = $_GET['page'];
                //     } 
                //     else {
                //         $page = 1;
                //     }

                //     $start_from = ($page - 1) * $per_page;
                //     $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";
                //     $run_pro = mysqli_query($con, $get_product);

                //     while ($row = mysqli_fetch_array($run_pro)) {
                //         $pro_id = $row['product_id'];
                //         $pro_title = $row['product_title'];
                //         $pro_price = $row['product_price'];
                //         $pro_img1 = $row['product_img1'];

                //         echo "
                //         <div class='col-md-4 col-sm-6 center-responsive' id = 'responsiveproducts'>
                //             <div class='product'>
                //                 <a href='details.php?pro_id=$pro_id'>
                //                     <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                //                 </a>
                //                 <div class='text'>
                //                     <h3>
                //                         <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                //                     </h3>
                //                     <p class='price'>
                //                         INR $pro_price
                //                     </p>
                //                     <p class='buttons'>
                //                         <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                //                         <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                //                             <i class='fa fa-shopping-cart'></i> Add to cart
                //                         </a>
                //                     </p>
                //                 </div>
                //             </div>
                //         </div>
                //         ";
                //     }
                // }
                // if(isset($_GET['p_cat'])) {
                //     $sub_cat_id=$_GET['p_cat'];
                //     $get_sub_cat="select * from sub_category where sub_cat_id='$sub_cat_id'";
                //     $run_sub_cat=mysqli_query($con, $get_sub_cat);
                //     $row_sub_cat=mysqli_fetch_array($run_sub_cat);
                //     $sub_cat_title=$row_sub_cat['sub_cat_name'];
                //     $sub_cat_desc=$row_sub_cat['sub_cat_desc'];
                //     $get_products="select * from products where sub_cat_id='$sub_cat_id'";
                //     $run_products=mysqli_query($con, $get_products);
                //     $count=mysqli_num_rows($run_products);
                //     if($count==0) {
                //         echo "
                //         <div class='box'>
                //         <h1>No Product Found In This Product Categories</h1>
                //         </div>
                //         ";
                //     }
                //     else{
                //         echo "
                //         <div class='box'>
                //         <h1>$sub_cat_title</h1>
                //         <p>$sub_cat_desc</p>
                //         </div>
                //         ";
                //     }
                //     while ($row_products = mysqli_fetch_array($run_products)) {
                //         $pro_id = $row_products['product_id'];
                //         $pro_title = $row_products['product_title'];
                //         $pro_price = $row_products['product_price'];
                //         $pro_img1 = $row_products['product_img1'];
                //         echo "
                //         <div class='col-md-4 col-sm-6 center-responsive'>
                //           <div class='product'>
                //           <a href='details.php?pro_id=$pro_id'>
                //           <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                //           </a>
                //           <div class='text'>
                //           <h3>
                //           <a href='details.php?pro_id=$pro_id'>
                //           $pro_title
                //           </a>
                //           </h3>
                //           <p class='price'>
                //           $pro_price
                //           </p>
                //           <p class='button'>
                //           <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                //           View details
                //           </a>
                //           <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                //           <i class='fa fa-shopping-cart'></i> Add to Cart
                //           </a>
                //           </p>
                //           </div>
                //           </div>
                //           </div>
                //         ";
                //     }
                // }
                // if(isset($_GET['cat_id'])) {
                //     $cat_id=$_GET['cat_id'];
                //     $get_cat="select * from categories where cat_id='$cat_id'";
                //     $run_cats=mysqli_query($con, $get_cat);
                //     $row_cat=mysqli_fetch_array($run_cats);
                //     $cat_title=$row_cat['cat_title'];
                //     $cat_desc=$row_cat['cat_desc'];
                //     $get_products="select * from products where cat_id='$cat_id'";
                //     $run_products=mysqli_query($con, $get_products);
                //     $count=mysqli_num_rows($run_products);
                //     if($count==0) {
                //         echo "
                //         <div class='box'>
                //         <h1>No Product Found In This Product Categories</h1>
                //         </div>
                //         ";
                //     }
                //     else{
                //         echo "
                //         <div class='box'>
                //         <h1>$cat_title</h1>
                //         <p>$cat_desc</p>
                //         </div>
                //         ";
                //     }
                //     while ($row_products = mysqli_fetch_array($run_products)) {
                //         $pro_id = $row_products['product_id'];
                //         $pro_title = $row_products['product_title'];
                //         $pro_price = $row_products['product_price'];
                //         $pro_desc = $row_products['product_desc'];
                //         $pro_img1 = $row_products['product_img1'];
                //         echo "
                //         <div class='col-md-4 col-sm-6 center-responsive' id =''>
                //           <div class='product'>
                //           <a href='details.php?pro_id=$pro_id'>
                //           <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                //           </a>
                //           <div class='text'>
                //           <h3>
                //           <a href='details.php?pro_id=$pro_id'>
                //           $pro_title
                //           </a>
                //           </h3>
                //           <p class='price'>
                //           $pro_price
                //           </p>
                //           <p class='button'>
                //           <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                //           View details
                //           </a>
                //           <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                //           <i class='fa fa-shopping-cart'></i> Add to Cart
                //           </a>
                //           </p>
                //           </div>
                //           </div>
                //           </div>
                //         ";
                //     }
                // }
            ?>
            </div>
            <!-- row ends -->
            <center>
                <ul class = "pagination">

                
                <?php
                if (!isset($_GET['p_cat']) && !isset($_GET['cat_id'])) {
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($con, $query);

                    $total_record = mysqli_num_rows($result);
                    $total_pages = ceil($total_record / $per_page);

                    echo "<li><a href='shop.php?page=1'>First Page</a></li>";

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li><a href='shop.php?page=" . $i . "'>" . $i . "</a></li>";
                    }

                    echo "<li><a href='shop.php?page=$total_pages'>Last Page</a></li>";
                }
                if(isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id'];
                    $query = "SELECT * FROM products where cat_id = '$cat_id'";
                    $result = mysqli_query($con, $query);

                    $total_record = mysqli_num_rows($result);
                    $total_pages = ceil($total_record / $per_page);
                    if($total_pages != 0) {
                        echo "<li><a href='shop.php?cat_id=$cat_id & page=1'>First Page</a></li>";

                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li><a href='shop.php?cat_id=$cat_id & page=" . $i . "'>" . $i . "</a></li>";
                        }

                        echo "<li><a href='shop.php?cat_id=$cat_id & page=$total_pages'>Last Page</a></li>";
                    }
                }
                if(isset($_GET['p_cat'])) {
                    $sub_cat_id = $_GET['p_cat'];
                    $query = "SELECT * FROM products where sub_cat_id = '$sub_cat_id'";
                    $result = mysqli_query($con, $query);

                    $total_record = mysqli_num_rows($result);
                    $total_pages = ceil($total_record / $per_page);
                    if($total_pages != 0) {
                        echo "<li><a href='shop.php?p_cat=$sub_cat_id & page=1'>First Page</a></li>";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li><a href='shop.php?p_cat=$sub_cat_id & page=" . $i . "'>" . $i . "</a></li>";
                        }
                        echo "<li><a href='shop.php?p_cat=$sub_cat_id & page=$total_pages'>Last Page</a></li>";
                    }
                }
                ?>
                </ul>
            </center>
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
    <script>
        $(document).ready(function() {
            $('#max-price').keyup(function() {
                applyFilterPrice();
            });
            $('#min-price').keyup(function() {
                applyFilterPrice();
            });
            $('#search-text').keyup(function() {
                applyFilterPrice();
            });


            $('.get_cat_id').change(function() {
                applyFilterPrice();
                // alert('aaa');
                // var d = document.getElementById('show_sub_cat');
                // if(d.style.display === 'none') {
                //     d.style.display = 'block';
                // }
            });
            $('.get_sub_cat_id').change(function() {
                applyFilterPrice();
            });

            $('#live-search').click(function() {
                applyFilterPrice();
            });
            $('#apply-filter-sub-category').click(function() {
                alert('aaa');
                applyFilterSubCategory();
            });
        });
    </script>
</body>
</html>