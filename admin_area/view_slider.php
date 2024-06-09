<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<!-- /row 1 starts -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Slides
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
                    <i class="fa fa-money fa-fw"></i> View Slides
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Slider ID</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Slider Delete</th>
                                <th>Slider Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $i = 0;
                                $get_sliders = "SELECT * FROM slider";
                                $run_sliders = mysqli_query($con, $get_sliders);
                                while ($row = mysqli_fetch_array($run_sliders)) {
                                    $slider_id = $row['id'];
                                    $slider_title = $row['slider_name'];
                                    $slider_image = $row['slider_image']; // Corrected line
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $slider_id; ?></td>
                                <td><?php echo $slider_title; ?></td>
                                <td><img src="slider_images/<?php echo $slider_image; ?>" alt="<?php echo $slider_title; ?>" height="50"></td>
                                <td><a href="index.php?delete_slider=<?php echo $slider_id; ?>">
                                    <i class="fa fa-trash"></i> Delete
                                </a></td>
                                <td><a href="index.php?edit_slider=<?php echo $slider_id; ?>">
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
