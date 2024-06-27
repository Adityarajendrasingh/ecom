<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}


else {



    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h3 class="panel-title">
                <i class="fa-solid fa-file-arrow-down">

                    </i> Insert User
                </h3>
            </div>

            <div class="panel-body">
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="admin_pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_contact">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_country">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Profession</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_job">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="admin_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">User About</label>
                       <div class="col-md-6">
                            <textarea name="admin_about" type = "text" cols="19" rows="6" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input value="Submit Now" type="submit" name="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])) {
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    $admin_country=$_POST['admin_country'];
    $admin_contact=$_POST['admin_contact'];
    $admin_about=$_POST['admin_about'];
    $admin_job=$_POST['admin_job'];
    $admin_image=$_FILES['admin_image']['name'];
    $temp_admin_image=$_FILES['admin_image']['tmp_name'];

    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");


    $insert_q = "insert into admin (admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about) values('$admin_name','$admin_email', '$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
    $run_q = mysqli_query($con, $insert_q);
    if($run_q) {
        echo "<script>alert('New admin has been registered successfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}

?>
<?php } ?>