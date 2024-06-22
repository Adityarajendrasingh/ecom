<?php
session_start();
if(!isset($_SESSION['email'])) {
    header("Location: customer_registration.php");
    exit(0);
}
$email = $_SESSION['email'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>A verification code has been sent to <?php echo $email; ?></h4>
            </div>
            <div class="card-body">
                <form action="verify_code.php" method="POST">
                    <div class="mb-3">
                        <label for="v_code">Code</label>
                        <input type="text" name="v_code" id="v_code" required class="form-control" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submitCode" class="btn btn-primary">Verify Code</button>
                    </div>
                </form>
            <div class="mb-3">
                <h6>Didn't get the code</h6>
                <a href="customer_registration.php"> <button type="submit" name="" class="btn btn-primary">Enter Details Again</button></a>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</
