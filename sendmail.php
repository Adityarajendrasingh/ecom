<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit-customer-form'])) {   
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    
    $check_cust = "SELECT * FROM customers WHERE customer_email = '$c_email'";
    $run_check_cust = mysqli_query($con, $check_cust);
    if (!$run_check_cust) {
        die('Query Failed: ' . mysqli_error($con));
    }
    $row = mysqli_num_rows($run_check_cust);
    if ($row > 0) {
        echo "<script>alert('This email already exists');</script>";
        echo "<script>window.open('customer_registration.php', '_self');</script>";
        exit;
    }

    $c_password = $_POST['c_password'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_tmp_image = $_FILES['c_image']['tmp_name']; 
    $code = mt_rand(100000, 999999);
    move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
    $insert_customer = "INSERT INTO customer_verification (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_image_temp, verify_token) VALUES ('$c_name', '$c_email', '$c_password', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_tmp_image','$code')";
    $run_customer = mysqli_query($con, $insert_customer);

    $fullname = $c_name;
    $email = $c_email;
    $subject = "Email Verification for Customer";

    // Store the email in a session variable
    $_SESSION['email'] = $c_email;

    //Create an instance; passing `true` enables exceptions
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
            <div>Code: '.$code.'</div>
        ';

        $mail->Body = $bodyContent; 
        
        if($mail->send()) {
            $_SESSION['status'] = "Thank you for contacting us - Team Funda of Web IT";
            header("Location: otp_verification.php");
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: customer_registration.php");
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: customer_registration.php");
    }
} else {
    echo "<script>alert('button problem');</script>";
}
?>
