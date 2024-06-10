<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php

	if (isset($_GET['edit_box'])) {
		$edit_box_id = $_GET['edit_box'];
		$edit_box_query = "select * from boxes_section where box_id='$edit_box_id'";
		$run_edit = mysqli_query($con,$edit_box_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$box_id = $row_edit['box_id'];
		$box_title = $row_edit['box_title'];
		$box_desc = $row_edit['box_desc'];
	}

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Box
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-pencil fa-fw"></i> Edit Box

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Box Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="box_title" class="form-control" value="<?php echo $box_title; ?>">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Box Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="box_desc" type="text" cols="30" rows="10" class="form-control"><?php echo $box_desc; ?></textarea>

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
		$box_title = $_POST['box_title'];
		$box_desc = $_POST['box_desc'];
		$update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";
		$run_box = mysqli_query($con,$update_box);
		if ($run_box) {
			echo "<script>alert('Your Box has been Updated')</script>";
			echo "<script>window.open('index.php?view_box','_self')</script>";
		}
	}

?>

<?php } ?>