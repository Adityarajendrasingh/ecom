<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
    $admin_email = $_SESSION['admin_email'];
    $find_admin_id = "select * from admins where admin_email = '$admin_email'";
    $run_find_admin = mysqli_query($con, $find_admin_id);
    $row = mysqli_fetch_array($run_find_admin);
    $admin_id = $row['admin_id'];
?>
<!-- /row 1 starts -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
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
                    <i class="fa fa-money fa-fw"></i>View Customers
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <td>Customer No</td>
                                <td>Customer ID</td>
                                <td>Customer Name</td>
                                <td>Customer Email</td>
                                <td>Customer Image</td>
                                <td>Customer Contact Number</td>
                                <td>Customer Country</td>
                                <td>Customer City</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_customers="select * from admins_customers where admin_id = '$admin_id'";
                                $run_customer=mysqli_query($con, $get_customers);
                                // echo "<script>alert('here')</script>";
                                while($row = mysqli_fetch_array($run_customer)) {
                                    $customer_id = $row['customer_id'];
                                    $customer_name = $row['customer_name'];
                                    $customer_email = $row['customer_email'];
                                    $customer_contact = $row['customer_contact'];
                                    $customer_country = $row['customer_country'];
                                    $customer_city = $row['customer_city'];
                                    $customer_image = $row['customer_image'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $customer_id; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><img src="../customer/customer_images/<?php echo $customer_image; ?>" height="50"></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_country; ?></td>
                                <td><?php echo $customer_city; ?></td>
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