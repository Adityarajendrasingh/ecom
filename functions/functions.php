<?php
// include("../shop.php.php");
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
            $customer_email = $_SESSION['customer_email'];
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['product_qty'];
            $product_size = $_POST['product_size'];
    
            $check_product = "SELECT * FROM cart WHERE customer_email='$customer_email' AND p_id='$p_id'";
            $run_check = mysqli_query($db, $check_product);
    
            if(mysqli_num_rows($run_check) > 0) {
                echo "<script>alert('This product is already in the cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            } 
            else {
                $query = "INSERT INTO cart(p_id, ip_add, qty, size, customer_email) VALUES('$p_id', '$ip_add', '$product_qty', '$product_size', '$customer_email')";
                $run_query = mysqli_query($db, $query);
                echo "<script>alert('Itme added to cart')</script>";
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
    function getSubCatsFilter($par_id) {
        global $db;
        $find_par_cat_id = "SELECT * FROM categories WHERE cat_id IN ($par_id)";
        $run_par_cat_id = mysqli_query($db, $find_par_cat_id);
    
        $par_names = [];
        while ($rowcat = mysqli_fetch_array($run_par_cat_id)) {
            array_push($par_names, $rowcat['cat_title']);
        }
    
        $par_names_string = "'" . implode("','", $par_names) . "'";
    
    
        $get_sub_cats = "SELECT * FROM sub_category WHERE cat_name IN ($par_names_string)";
        $run_sub_cats = mysqli_query($db, $get_sub_cats);
        if(mysqli_num_rows($run_sub_cats) > 0) {
        echo"
        <div class='panel-heading'>
            <h3 class='panel-title'>Sub Category</h3>
        </div>
        <div class='panel-body'>
            <ul class='nav nav-pills nav-stacked category-menu'>";
        while($row_sub_cats = mysqli_fetch_array($run_sub_cats)) {
            $sub_cat_id=$row_sub_cats['sub_cat_id'];
            $sub_cat_title=$row_sub_cats['sub_cat_name'];
            echo "<li><input type='checkbox' class = 'get_sub_cat_id' id='' name='$sub_cat_title' value='$sub_cat_id'>  $sub_cat_title</li>";
        }
        echo "</ul>
            <br> <button id='apply-filter-sub-category' class='btn btn-primary'>Apply Sub Category Filter</button>
            </div>";}
    }


    function getSubCats() {
        global $db;
        $get_sub_cats = "SELECT * FROM sub_category";
        $run_sub_cats = mysqli_query($db, $get_sub_cats);
        if(mysqli_num_rows($run_sub_cats) > 0) {
            while($row_sub_cats = mysqli_fetch_array($run_sub_cats)) {
                $sub_cat_id=$row_sub_cats['sub_cat_id'];
                $sub_cat_title=$row_sub_cats['sub_cat_name'];
                echo "<li><input type='checkbox' class = 'get_sub_cat_id' id='' name='$sub_cat_title' value='$sub_cat_id'>  $sub_cat_title</li>";
            }
        }
    }


function getCat() {
    global $db;
    $get_cat="select * from Categories";
    $run_cat=mysqli_query($db, $get_cat);
    while($row_cat=mysqli_fetch_array($run_cat)) {
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];       
        echo "<li><input type='checkbox' class = 'get_cat_id' id='' name='$cat_title' value='$cat_id'>  $cat_title</li>";
    }
}

function sendemail_verify($name, $email, $code) {
    
}



?>
<script>
    function applyFilterPrice() {
        var minPrice = $('#min-price').val();
        var maxPrice = $('#max-price').val();
        var live_search = $('#search-text').val();
        var allcats = [];
        $('.get_cat_id').each(function() {
            if($(this).is(":checked")) {
                allcats.push($(this).val());
            }
        });
        var allsubcats = [];
        $('.get_sub_cat_id').each(function() {
            if($(this).is(":checked")) {
                allsubcats.push($(this).val());
            }
        });
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: {
                'min_price': minPrice,
                'max_price': maxPrice,
                'live_search': live_search,
                'categories':allcats,
                'subcategories':allsubcats
            },
            success: function(response) {
                console.log('Server response:', response);
                $('#products_list_filter').html(response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
        $.ajax({
            url: 'show_sub_cat_list.php',
            method: 'POST',
            data: {
                'cat_sub':allcats
            },
            success: function(response) {
                console.log('Server response:', response);
                $('#show_sub_cat').html(response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    }   
    // function applyFilterSubCategory() {
    //     var allsubcats = [];
    //     $('.get_sub_cat_id').each(function() {
    //         if($(this).is(":checked")) {
    //             allsubcats.push($(this).val());
    //         }
    //     });
    //     $.ajax({
    //         url: 'process.php',
    //         method: 'POST',
    //         data: {
    //             'subcategories':allsubcats
    //         },
    //         success: function(response) {
    //             console.log('Server response:', response);
    //             $('#products_list_filter').html(response);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('AJAX error:', error);
    //         }
    //     });
    // }
</script>
