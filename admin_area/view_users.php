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
                                <td>Admin Name</td>
                                <td>Admin Email</td>
                                <td>Admin Image</td>
                                <td>Admin Profession</td>
                                <td>Admin Contact Number</td>
                                <td>Admin Country</td>
                                <td>Admin Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $get_admins="select * from admins";
                                $run_admin=mysqli_query($con, $get_admins);
                                while($row = mysqli_fetch_array($run_admin)) {
                                    $admin_id = $row['admin_id'];
                                    $admin_name = $row['admin_name'];
                                    $admin_email = $row['admin_email'];
                                    $admin_contact = $row['admin_contact'];
                                    $admin_country = $row['admin_country'];
                                    $admin_job = $row['admin_job'];
                                    $admin_image = $row['admin_image'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $admin_name; ?></td>
                                <td><?php echo $admin_email; ?></td>
                                <td><img src="admin_images/<?php echo $admin_image; ?>" height="50"></td>
                                <td><?php echo $admin_job; ?></td>
                                <td><?php echo $admin_contact; ?></td>
                                <td><?php echo $admin_country; ?></td>
                                <td><a href="index.php?admin_delete=<?php echo $admin_id; ?>">
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