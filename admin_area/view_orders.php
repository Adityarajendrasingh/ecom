<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<!-- /row 1 starts -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
        </ol>
    </div>
</div>
<!-- row 1 ends -->
 <!-- row 2 starts-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Order ID</td>
                                <td>Invoice Number</td>
                                <td>Product Title</td>
                                <td>Customer Email</td>
                                <td>Order Qty</td>
                                <td>Order Date</td>
                                <td>Order Amount</td>
                                <td>Order Status</td>
                                <td>Delete Order</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_Orders="select * from customer_order";
                                $run_Order=mysqli_query($con, $get_Orders);
                                while($row = mysqli_fetch_array($run_Order)) {
                                    $Order_id = $row['order_id'];
                                    $Order_date = $row['order_date'];
                                    $Order_status = $row['order_status'];
                                    $customer_id = $row['customer_id'];
                                    $invoice_no = $row['invoice_no'];
                                    $product_id = $row['product_id'];
                                    $due_amount = $row['due_amount'];
                                    $qty = $row['qty'];
                                    $get_products = "select * from products where product_id = '$product_id'";
                                    $run_products = mysqli_query($con, $get_products);
                                    $row_pro = mysqli_fetch_array($run_products);
                                    $product_title = $row_pro['product_title'];
                                    $get_products = "select * from customers where customer_id = '$customer_id'";
                                    $run_products = mysqli_query($con, $get_products);
                                    $row_pro = mysqli_fetch_array($run_products);
                                    $customer_email = $row_pro['customer_email'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $Order_id; ?></td>
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $Order_date; ?></td>
                                <td><?php echo $due_amount; ?></td>
                                <td><?php echo $Order_status; ?></td>
                                <td><a href="index.php?order_delete=<?php echo $Order_id; ?>">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row 2 ends -->

<?php } ?>