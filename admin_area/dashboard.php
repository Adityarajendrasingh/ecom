<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
    
?>

<!-- row starts -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Dashboard
                </li>
            </ol>
        </h1>
    </div>
</div>
<!-- row ends -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_pro; ?></div>
                        <div class="huge">Products</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_cust; ?></div>
                        <div class="huge">Customers</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_p_cat; ?></div>
                        <div class="huge">Categories</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_cats">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_order; ?></div>
                        <div class="huge">Orders</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- row 3 ends -->

<!-- row 3 ends -->
 <div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>New Orders
                </h3>
            </div>
            <!-- panel-heading ends -->
             <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Customer Email</th>
                                <th>Invoice No</th>
                                <th>Product ID</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $i = 0;
                                $get_order = "SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0,5";
                                $run_order = mysqli_query($con, $get_order);
                                while($row = mysqli_fetch_array($run_order)) {
                                    $order_id = $row['order_id'];
                                    $customer_id = $row['customer_id'];
                                    $product_id = $row['product_id'];
                                    $invoice_no = $row['invoice_no'];
                                    $order_status = $row['order_status'];
                                    $qty = $row['qty'];
                                    $size = $row['size'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php 
                                    $get_cust = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
                                    $run_cust = mysqli_query($con, $get_cust);
                                    $row_cust = mysqli_fetch_array($run_cust);
                                    $customer_email = $row_cust['customer_email'];
                                    echo $customer_email;
                                    ?>
                                </td>
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $size; ?></td> 
                                <td><?php echo $order_status; ?></td> 
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
             </div>
        </div>
    </div>
<!-- col-lg-8 ends -->

    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_images/<?php echo $admin_image; ?>" alt="" class="rounded img-responsive">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                        <span class="thumb-info-type"><?php echo $admin_job; ?></span>
                    </div>
                </div>
                <!-- thumb info mb-md ends -->


                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i><span> Email : </span><?php echo $admin_email; ?><br>
                        <i class="fa fa-user"></i><span> Country : </span><?php echo $admin_country; ?><br>
                        <i class="fa fa-user"></i><span> Contact : </span><?php echo $admin_contact; ?><br>
                    </div>
                    <!-- widget ends -->

                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <p><?php echo $admin_about; ?></p>                    

                </div>
                <!-- mb-md ends -->

            </div>
        </div>
    </div>
 </div>

<?php } ?>