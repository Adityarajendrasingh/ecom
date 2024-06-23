<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");

if(isset($_POST['submitadminCode'])) {
    $otp = $_POST['v_code'];
    $email = $_SESSION['email'];

    // Fetch admin details
    $query_code = "SELECT * FROM admin_verification WHERE verify_token = '$otp' AND admin_email = '$email'";
    $run_query_code = mysqli_query($con, $query_code);

    if(mysqli_num_rows($run_query_code) > 0) {
        $admin_details = mysqli_fetch_assoc($run_query_code);
        $insert_admin = "INSERT INTO admins (admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about) VALUES ('".$admin_details['admin_name']."', '".$admin_details['admin_email']."', '".$admin_details['admin_pass']."', '".$admin_details['admin_image']."', '".$admin_details['admin_contact']."', '".$admin_details['admin_country']."', '".$admin_details['admin_job']."', '".$admin_details['admin_about']."')";
        if(mysqli_query($con, $insert_admin)) {
            $delete_admin_verification = "DELETE FROM admin_verification WHERE admin_email = '$email'";
            mysqli_query($con, $delete_admin_verification);
            
            echo "<script>
                    alert('Verification successful');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to insert into admins table');
                    window.location.href = 'otp_verification.php';
                  </script>";
        }
    } 
    else {
        echo "<script>
                alert('Invalid verification code');
                window.location.href = 'otp_verification.php';
              </script>";
    }
}
?>
