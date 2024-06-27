<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php

if(isset($_GET['c_id'])) {
    $customer_id=$_GET['c_id'];
    }
$ip_add = getUserIP();
$status = "pending";//offline medium
$invoice_no = mt_rand();
$select_cart="select * from carts where ip_add='$ip_add'";
$run_cart=mysqli_query($con, $select_cart);

while($row_cart = mysqli_fetch_array($run_cart)) {
    $pro_id=$row_cart['p_id'];
    $pro_size=$row_cart['size'];
    $pro_qty=$row_cart['qty'];
    $get_products="select * from products where product_id='$pro_id'";
    $run_product=mysqli_query($con, $get_products);
    while($row_pro = mysqli_fetch_array($run_product)) {
        $admin_id = $row_pro['admin_id'];
        $check_customer = "select * from admin_customers where admin_id = '$admin_id' AND customer_id = '$customer_id'";
        $run_check_customers = mysqli_query($con, $check_customer);
        $count = mysqli_num_rows($run_check_customers);
        if($count == 0) {
            $find_cust_to_insert = "select * from customers where customer_id = '$customer_id'";
            $run_find_cust_to_insert = mysqli_query($con, $find_cust_to_insert);
            $row_cut_to_insert = mysqli_fetch_array($run_find_cust_to_insert);
            $customer_name = $row_cut_to_insert['customer_name'];
            $customer_email = $row_cut_to_insert['customer_email'];
            $customer_image = $row_cut_to_insert['customer_image'];
            $customer_country = $row_cut_to_insert['customer_country'];
            $customer_contact = $row_cut_to_insert['customer_contact'];
            $customer_city = $row_cut_to_insert['customer_city'];
            $insert_admin_customer="insert into admin_customers (customer_id, admin_id, customer_name, customer_email, customer_image, customer_contact, customer_country, customer_city) values('$customer_id','$admin_id','$customer_name','$customer_email','$customer_image','$customer_contact','$customer_country','$customer_city')";
            $run_cust_order=mysqli_query($con, $insert_admin_customer);
        }
        $sub_total=$row_pro['product_price']*$pro_qty;
        $insert_customer_order="insert into customer_order (customer_id, due_amount, invoice_no, qty, size, order_date, order_status, product_id) values('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status','$pro_id')";
        $run_cust_order=mysqli_query($con, $insert_customer_order);
        $delete_cart="delete from carts where ip_add='$ip_add'";
        $run_del=mysqli_query($con, $delete_cart);
        echo "<script>alert('Your order has been placed')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";

    }
}
?>
