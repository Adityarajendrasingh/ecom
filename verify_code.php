<?php
    function getUserIP() {
        switch(true) {
            case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");

if(isset($_POST['submitCode'])) {
    $otp = $_POST['v_code'];
    $email = $_SESSION['email'];

    // Fetch customer details
    $query_code = "SELECT * FROM customer_verification WHERE verify_token = '$otp' AND customer_email = '$email'";
    $run_query_code = mysqli_query($con, $query_code);

    if(mysqli_num_rows($run_query_code) > 0) {
        $customer_details = mysqli_fetch_assoc($run_query_code);
        $ip = getUserIP();
        $c_image = $customer_details['customer_image'];
        $c_tmp_image = $customer_details['customer_image_temp'];
        $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('".$customer_details['customer_name']."', '".$customer_details['customer_email']."', '".$customer_details['customer_pass']."', '".$customer_details['customer_country']."', '".$customer_details['customer_city']."', '".$customer_details['customer_contact']."', '".$customer_details['customer_address']."', '".$customer_details['customer_image']."', '$ip')";
        if(mysqli_query($con, $insert_customer)) {
            // Delete from customer_verification table
            $delete_customer_verification = "DELETE FROM customer_verification WHERE customer_email = '$email'";
            mysqli_query($con, $delete_customer_verification);
            
            echo "<script>
                    alert('Verification successful');
                    window.location.href = 'checkout.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to insert into customers table');
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
