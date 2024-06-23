<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit_admin_form'])) {
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $check_cust = "select * from admins where admin_email = '$admin_email'";
    $run_check_cust = mysqli_query($con, $check_cust);
    if (!$run_check_cust) {
        die('Query Failed: ' . mysqli_error($con));
    }
    $row = mysqli_num_rows($run_check_cust);
    if($row > 0) {
        echo "<script>alert('This email already exists');</script>";
        echo "<script>window.open('new_register.php', '_self');</script>";
        exit;
    }
    $admin_pass=$_POST['admin_pass'];
    $admin_country=$_POST['admin_country'];
    $admin_contact=$_POST['admin_contact'];
    $admin_about=$_POST['admin_about'];
    $admin_job=$_POST['admin_job'];
    $admin_image=$_FILES['admin_image']['name'];
    $temp_admin_image=$_FILES['admin_image']['tmp_name'];
    $verify_token = mt_rand(100000, 999999);
    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
    $insert_q = "insert into admin_verification (admin_name, admin_email, admin_pass, admin_country, admin_contact, admin_image, admin_temp_image, verify_token, admin_job, admin_about) values('$admin_name','$admin_email', '$admin_pass','$admin_country','$admin_contact','$admin_image','$temp_admin_image','$verify_token','$admin_job','$admin_about')";
    $run_q = mysqli_query($con, $insert_q);


    $fullname = $admin_name;
    $email = $admin_email;
    $subject = "Email Verification";

    $_SESSION['email'] = $admin_email;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        
        $mail->Host       = 'smtp.gmail.com';
        $mail->Username   = 'webemailfornewsite@gmail.com';
        $mail->Password   = '';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('webemailfornewsite@gmail.com', 'aditya singh');
        $mail->addAddress($email, $fullname);

        $mail->isHTML(true);
        $mail->Subject = 'New enquiry - emailtest';
        $mail->Body = 'This is the proof that email has been sent successfully';

        $bodyContent = '<div>Hello, you got a new enquiry</div>
            <div>Fullname: '.$fullname.'</div>
            <div>Email: '.$email.'</div>
            <div>Subject: '.$subject.'</div>
            <div>Code: '.$verify_token.'</div>
        ';

        $mail->Body = $bodyContent; 
        
        if($mail->send()) {
            $_SESSION['status'] = "Thank you for registering";
            header("Location: otp_verification.php");
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: new_register.php");
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: new_register.php");
    }
} 
else {
    echo "<script>alert('button problem');</script>";
}
?>
