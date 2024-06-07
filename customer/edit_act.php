<?php
$customer_email = $_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con, $get_customer);
$row=mysqli_fetch_array($run_cust);
$customer_id=$row['customer_id'];
$customer_name=$row['customer_name'];
$customer_email=$row['customer_email'];
$customer_country=$row['customer_country'];
$customer_city=$row['customer_city'];
$customer_contact=$row['customer_contact'];
$customer_address=$row['customer_address'];
$customer_image=$row['customer_image'];
?>


<div class="box">
    <center>
        <h1>
            Edit Your Account
        </h1>
    </center>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="">Customer Name</label>
            <input type="text" class="form-control" name="c_name" value="<?php echo $customer_name; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Customer Email</label>
            <input type="text" class="form-control" name="c_email" value="<?php echo $customer_email; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Country</label>
            <input type="text" class="form-control" name="c_country" value="<?php echo $customer_country; ?>" required>
        </div>
        <div class="form-group">
            <label for="">City</label>
            <input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Customer Number</label>
            <input type="text" class="form-control" name="c_number" value="<?php echo $customer_contact; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Customer Address</label>
            <input type="text" class="form-control" name="c_address" value="<?php echo $customer_address; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="c_image">
            <img src="customer_images/<?php echo $customer_image; ?>" alt="" class="img-responsive" height="100" width="100">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="update" type="submit">
                Update
            </button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['update'])){
    $update_id = $customer_id;
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_address = $_POST['c_address'];
	$c_contact = $_POST['c_number'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	move_uploaded_file($c_image_tmp, "customer_images/$c_image");
	$update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";
	$run_customer = mysqli_query($con,$update_customer);
	if ($run_customer) {
		echo "<script>alert('Your Account has been edited, to complete the process, Please login again')</script>";
		echo "<script>window.open('../logout.php','_self')</script>";
	}
}
?>