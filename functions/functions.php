<?php
    $db = mysqli_connect("localhost", "root", "", "ecom");

    function getUserIP() {
        switch(true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
    
    function addCart() {
        global $db;
        if(isset($_GET['add_cart'])) {
            $ip_add = getUserIP();
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['product_qty'];
            $product_size = $_POST['product_size'];
    
            $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
            $run_check = mysqli_query($db, $check_product);
    
            if(mysqli_num_rows($run_check) > 0) {
                echo "<script>alert('This product is already in the cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            } 
            else {
                // $query = "INSERT INTO cart(p_id, ip_add, qty, size) VALUES('$p_id', '$ip_add', '$product_qty', '$product_size')";
                // $run_query = mysqli_query($db, $query);
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
        }
    }


    function item() {
        global $db;
        $ip_add = getUserIP();
        $get_items="select * from cart where ip_add='$ip_add'";
        $run_item=mysqli_query($db, $get_items);
        $count = mysqli_num_rows($run_item);
        echo $count;
    }

// total price
function totalPrice() {
    global $db;
    $ip_add = getUserIP();
    $total_price = 0;

    $get_items = "SELECT * FROM cart WHERE ip_add='$ip_add'";
    $run_items = mysqli_query($db, $get_items);

    while ($row = mysqli_fetch_array($run_items)) {
        $pro_id = $row['p_id'];
        $pro_qty = $row['qty'];  // Make sure this column name matches your database schema

        $get_price = "SELECT * FROM products WHERE product_id='$pro_id'";
        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {
            $product_price = $row_price['product_price'];
            $sub_total = $product_price * $pro_qty;
            $total_price += $sub_total;
        }
    }
    echo $total_price;
}





    function getPro() {
        global $db;
        $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 6";
        $run_products = mysqli_query($db, $get_product);
        while ($row_product = mysqli_fetch_array($run_products)) {
            $pro_id = $row_product['product_id'];
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_img1 = $row_product['product_img1'];
            echo "
                <div class='col-md-4 col-sm-6'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                            </h3>
                            <p class='price'>INR $pro_price</p>
                            <p class='buttons'>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-deafult'>View Details</a>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
// product categories called in sidebar.php

function getSubCats() {
    global $db;
    $get_sub_cats="select * from sub_category";
    $run_sub_cats=mysqli_query($db, $get_sub_cats);
    while($row_sub_cats = mysqli_fetch_array($run_sub_cats)) {
        $sub_cat_id=$row_sub_cats['sub_cat_id'];
        $sub_cat_title=$row_sub_cats['sub_cat_name'];
        echo "<li><a href='shop.php?p_cat=$sub_cat_id'>$sub_cat_title</a></li>";
    }
}


function getCat() {
    global $db;
    $get_cat="select * from Categories";
    $run_cat=mysqli_query($db, $get_cat);
    while($row_cat=mysqli_fetch_array($run_cat)) {
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];
        echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
    }
}

function sendemail_verify($name, $email, $code) {
    
}
?>
