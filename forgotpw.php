<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check_email = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
    if(mysqli_num_rows($check_email) > 0){
        $token = bin2hex(random_bytes(16)); // Generate token
        $update_token_query = mysqli_query($conn, "UPDATE `users` SET token = '$token' WHERE email = '$email'");
        if($update_token_query){
            // Send email with a link to reset_password.php?token=$token
            $reset_link = "https://yourwebsite.com/reset_password.php?token=$token"; // Change this to your domain
            $email_body = "Click the link to reset your password: $reset_link";
            // Use PHP's mail function or a library like PHPMailer to send the email
            // mail($email, "Password Reset", $email_body);
            echo "Email sent successfully. Check your inbox.";
        } else {
            echo "Token update failed.";
        }
    } else {
        echo "Email doesn't exist in our records.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/4801a7dc21.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/login.css">

</head>
<body>


   
<section class="contact_us">

<div class="row_us">

   <div class="image">
      <img src="./images/login.jpg" alt="">
   </div>

   <form action="" method="post">
      <h3>FORGOT PASSWORD !</h3>
      <input type="email" name="email" placeholder="Enter Your Email" required class="box">
      <input type="submit" value="Reset Now" name="submit" class="btn">
   </form>

</div>

</section>

</body>
</html>