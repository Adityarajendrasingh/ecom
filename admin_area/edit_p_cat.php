<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php

	if (isset($_GET['edit_p_cat'])) {
		$edit_sub_cat_id = $_GET['edit_p_cat'];
		$edit_sub_cat_query = "select * from sub_category where sub_cat_id='$edit_sub_cat_id'";
		$run_edit = mysqli_query($con,$edit_sub_cat_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$sub_cat_id = $row_edit['sub_cat_id'];
		$sub_cat_title = $row_edit['sub_cat_name'];
		$sub_cat_desc = $row_edit['sub_cat_desc'];
		$cat_title = $row_edit['cat_name'];
	}

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Sub Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-pencil fa-fw"></i> Edit Sub Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Sub Category Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="sub_cat_title" class="form-control" value="<?php echo $sub_cat_title; ?>">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->
					<div class="form-group">
                        <label class="col-md-3 control-label">Parent Category</label>
                       <div class="col-md-6">
                            <select name="cat_title" id="" class="form-control">
                                <?php
                                $find_cat = "select * from categories";
                                $run_cat = mysqli_query($con, $find_cat);
                                $i = 1;
                                while($row = mysqli_fetch_array($run_cat)) {
                                    $cat_name = $row['cat_title'];
                                    echo "<option value=$i>$cat_name</option>";
                                    $i++;
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Sub Category Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="sub_cat_desc" type="text" cols="30" rows="10" class="form-control"><?php echo $sub_cat_desc; ?></textarea>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="submit" name="update" class="form-control btn btn-primary" value="Update">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

				</form>

			</div><!-- panel-body finish -->

		</div><!-- panel panel-default finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<?php 

	if (isset($_POST['update'])) {
		$sub_cat_title = $_POST['sub_cat_title'];
		$sub_cat_desc = $_POST['sub_cat_desc'];
		$cat_title= $_POST['cat_title'];
		$update_sub_cat = "update sub_category set sub_cat_name='$sub_cat_title', cat_name='$cat_title', sub_cat_desc='$sub_cat_desc' where sub_cat_id='$sub_cat_id'";
		$run_sub_cat = mysqli_query($con, $update_sub_cat);
		if ($run_sub_cat) {
			echo "<script>alert('Your Sub Category has been Updated')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";
		}
	}

?>

<?php } ?>