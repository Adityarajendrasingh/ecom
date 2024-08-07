<?php

session_start();
include("includes/db.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> New User Registration
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h3 class="panel-title">
                <i class="fa-solid fa-file-arrow-down">

                    </i> Insert User
                </h3>
            </div>

            <div class="panel-body">
                <form action="sendmail.php" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit_admin_form">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<?php
// if(isset($_POST['submit_admin_form'])) {
//     $admin_name=$_POST['admin_name'];
//     $admin_email=$_POST['admin_email'];
//     $check_cust = "select * from admins where admin_email = '$admin_email'";
//     $run_check_cust = mysqli_query($con, $check_cust);
//     $row = mysqli_num_rows($run_check_cust);
//     if($row > 0) {
//         echo "<script>alert('This email already exists')</script>";
//         echo "<script>window.open('new_register.php','_self')</script>";
//     }
//     else{
//         $admin_pass=$_POST['admin_pass'];
//         $admin_country=$_POST['admin_country'];
//         $admin_contact=$_POST['admin_contact'];
//         $admin_about=$_POST['admin_about'];
//         $admin_job=$_POST['admin_job'];
//         $admin_image=$_FILES['admin_image']['name'];
//         $temp_admin_image=$_FILES['admin_image']['tmp_name'];

//         // move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
//         $insert_q = "insert into admin_verification (admin_name, admin_email, admin_pass, admin_country, admin_image, admin_contact, admin_job, admin_about) values('$admin_name','$admin_email', '$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
//         $run_q = mysqli_query($con, $insert_q);
//         if($run_q) {
//             echo "<script>alert('New admin has been registered successfully')</script>";
//             echo "<script>window.open('login.php','_self')</script>";
//         }
//     }
// }

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>