<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
    
    $admin_session = $_SESSION['admin_email'];
    $get_admin = "select * from admins where admin_email='$admin_session'";
    $run_email= mysqli_query($con, $get_admin);
    $row = mysqli_fetch_array($run_email);
    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_image = $row['admin_image'];
    $admin_country = $row['admin_country'];
    $admin_job = $row['admin_job'];
    $admin_contact = $row['admin_contact'];
    $admin_about = $row['admin_about'];

    $get_pro = "select * from products";
    $run_pro = mysqli_query($con, $get_pro);
    $count_pro = mysqli_num_rows($run_pro);

    $get_cust = "select * from customers";
    $run_cust = mysqli_query($con, $get_cust);
    $count_cust = mysqli_num_rows($run_cust);

    $get_p_cat = "select * from product_category";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $count_p_cat = mysqli_num_rows($run_p_cat);   

    $get_p_cat = "select * from customer_order";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $count_order = mysqli_num_rows($run_p_cat);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
       <div id="page-wrapper" class="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                <?php
                if(isset($_GET['dashboard'])) {
                    include("dashboard.php");
                }
                if(isset($_GET['insert_products'])) {
                    include("insert_product.php");
                }
                if(isset($_GET['view_products'])) {
                    include("view_product.php");
                }
                
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>