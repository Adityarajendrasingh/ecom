<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce Website</title>
    <!-- bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- row starts -->
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert Slider
                </li>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa-solid fa-file-arrow-down"></i> Insert Slider
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Name:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="slider_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Image:</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="slider_image" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit" class="btn btn-primary form-control" name="submit" value="Submit Now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row ends -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
if (isset($_POST['submit'])) {
    $slider_name = $_POST['slider_name'];
    $slider_image = $_FILES['slider_image']['name'];
    $temp_name = $_FILES['slider_image']['tmp_name'];

    $view_slides = "SELECT * FROM slider";
    $run_slides = mysqli_query($con, $view_slides);
    $count = mysqli_num_rows($run_slides);

    if ($count < 4) {
        if (move_uploaded_file($temp_name, "slider_images/$slider_image")) {
            $insert_slide = "INSERT INTO slider (slider_name, slider_image) VALUES ('$slider_name', '$slider_image')";
            $run_slide = mysqli_query($con, $insert_slide);

            if ($run_slide) {
                echo "<script>alert('New Slide has been Inserted')</script>";
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            } else {
                echo "<script>alert('Database Insertion Failed')</script>";
            }
        } else {
            echo "<script>alert('File Upload Failed')</script>";
        }
    } else {
        echo "<script>alert('You have already all the sliders')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}
?>

</body>
</html>
<?php } ?>
