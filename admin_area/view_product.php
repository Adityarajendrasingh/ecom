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
                <i class="fa fa-dashboard"></i> Dashboard / View Products
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
                    <i class="fa fa-money fa-fw"></i>View Products
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <td>Sr No</td>
                                <td>Product ID</td>
                                <td>Product Title</td>
                                <td>Product Image</td>
                                <td>Product Price</td>
                                <td>Product Keyword</td>
                                <td>Product Category</td>
                                <td>Product Delete</td>
                                <td>Product Edit</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_products="select * from products";
                                $run_product=mysqli_query($con, $get_products);
                                while($row = mysqli_fetch_array($run_product)) {
                                    $pro_id = $row['product_id'];
                                    $pro_title = $row['product_title'];
                                    $pro_price = $row['product_price'];
                                    $pro_img = $row['product_img1'];
                                    $pro_keywords = $row['product_keywords'];
                                    $pro_date = $row['date'];
                                    $i++;
                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pro_id; ?></td>
                                <td><?php echo $pro_title; ?></td>
                                <td><img src="product_images/<?php echo $pro_img; ?>" width="100"></td>
                                <td><?php echo $pro_price; ?></td>
                                <td><?php echo $pro_keywords; ?></td>
                                <td><?php echo $pro_date; ?></td>
                                <td><a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                </a></td>
                                <td><a href="index.php?edit_product=<?php echo $pro_id; ?>">
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