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
                <i class="fa fa-dashboard"></i> Dashboard / View Product Categories
            </li>
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
                    <i class="fa fa-money fa-fw"></i>View Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <td>Sr No</td>
                                <td>Category ID</td>
                                <td>Category Title</td>
                                <td>Category Description</td>
                                <td>Category Delete</td>
                                <td>Category Edit</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_products="select * from categories";
                                $run_product=mysqli_query($con, $get_products);
                                while($row = mysqli_fetch_array($run_product)) {
                                    $pro_id = $row['cat_id'];
                                    $pro_title = $row['cat_title'];
                                    $pro_desc = $row['cat_desc'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pro_id; ?></td>
                                <td><?php echo $pro_title; ?></td>
                                <td><?php echo $pro_desc; ?></td>
                                <td><a href="index.php?delete_cat=<?php echo $pro_id; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                </a></td>
                                <td><a href="index.php?edit_cat=<?php echo $pro_id; ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                </a></td>
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