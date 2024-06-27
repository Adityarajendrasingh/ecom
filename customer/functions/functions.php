<?php
    $db = mysqli_connect("localhost", "root", "", "ecom");

    function getPro() {
        global $db;
        $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 6";
        $run_products = mysqli_query($db, $get_product);
        while ($row_product = mysqli_fetch_array($run_products)) {
            $pro_id = $row_product['product_id'];
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_img1 = $row_product['product_img1'];
            // $pro_img2 = $row_product['product_img2'];
            // $pro_img3 = $row_product['product_img3'];
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
    function getUserIP() {
        switch(true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
    function item() {
        global $db;
        $ip_add = getUserIP();
        $get_items="select * from carts where ip_add='$ip_add'";
        $run_item=mysqli_query($db, $get_items);
        $count = mysqli_num_rows($run_item);
        echo $count;
    }
    function totalPrice() {
        global $db;
        $ip_add = getUserIP();
        $total_price = 0;
    
        $get_items = "SELECT * FROM carts WHERE ip_add='$ip_add'";
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
?>
