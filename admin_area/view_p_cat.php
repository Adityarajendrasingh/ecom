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
                    <i class="fa fa-money fa-fw"></i>View Product Categories
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <td>Sr No</td>
                                <td>Product Category ID</td>
                                <td>Product Category Title</td>
                                <td>Product Category Description</td>
                                <td>Product Category Delete</td>
                                <td>Product Category Edit</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_products="select * from product_category";
                                $run_product=mysqli_query($con, $get_products);
                                while($row = mysqli_fetch_array($run_product)) {
                                    $pro_id = $row['p_cat_id'];
                                    $pro_title = $row['p_cat_title'];
                                    $pro_desc = $row['p_cat_desc'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pro_id; ?></td>
                                <td><?php echo $pro_title; ?></td>
                                <td><?php echo $pro_desc; ?></td>
                                <td><a href="index.php?delete_p_cat=<?php echo $pro_id; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                </a></td>
                                <td><a href="index.php?edit_p_cat=<?php echo $pro_id; ?>">
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