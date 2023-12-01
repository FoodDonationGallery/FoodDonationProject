<?php

include 'connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
 
 if(isset($_POST['submit'])){
  
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
 
    mysqli_query($conn, "UPDATE `users` SET email = '$update_email' WHERE id = '$user_id'") or die('query failed');
 
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
 
    if(!empty($new_pass) || !empty($confirm_pass)){
       if($new_pass != $confirm_pass){
          $message[] = 'Confirm Password not matched!';
       }else{
          mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
          $message[] = 'Password Reset Successfully!';
          header('location:login.php');
       }
    }
 }

//  if (isset($_POST['submit'])) {
//    echo "<script>alert('Password Reset Successfully!')</script>";
//    header('location:login.php');
// }
 
 
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
   <style>
      #message{
         display: none;
         background: #f1f1f1;
         color: #000;
         position: relative;
         padding:20px;
         margin-top: 10px;
      }
      #message p{
         padding: 10px 35px;
         font-size: 18px;
      }
      .valid{
         color: green;
      }
      .valid:before{
         position: relative;
         left:-3px;
         content: "✔";
      }
      .invalid{
         color: red;
      }
      .invalid:before{
         position: relative;
         left: -35px;
         content:"✖";
      }
   </style>


   <!--- Password validation Css code ---->
   <style>
      #message{
         display: none;
         background: #f1f1f1;
         color: #000;
         position: relative;
         padding:20px;
         margin-top: 10px;
      }
      #message p{
         padding: 10px 35px;
         font-size: 18px;
      }
      .valid{
         color: green;
      }
      .valid:before{
         position: relative;
         left:-3px;
         content: "✔";
      }
      .invalid{
         color: red;
      }
      .invalid:before{
         position: relative;
         left: -35px;
         content:"✖";
      }
   </style>


</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

   
<section class="contact_us">

<div class="row_us">

   <div class="image">
      <img src="./images/login.jpg" alt="">
   </div>

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>


   <form action="" method="post" enctype="multipart/form-data">
      <h3 style="margin-bottom: 30px;">FORGOT PASSWORD !</h3>
      <span>Your Email :</span>
      <input type="email" name="update_email" placeholder="Enter Email" value="<?php echo $fetch['email']; ?>" class="box">
      <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
      <span>Old Password :</span>
      <input type="password" name="update_pass" placeholder="Enter Old Password" class="box">
      <span>New Password :</span>
      <input type="password" id="PSW" name="new_pass" placeholder="Enter New Password" class="box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      <span>Confirm Password :</span>
      <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box">

      <input type="submit" value="Password Reset Now" name="submit" class="btn">
   </form>

   <!--Validation msg box-->
<div id="message">
   <h3> Password must contain the following:</h3>
   <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
   <p id="capital" class="invalid">A <b>Uppercase</b> letter</p>
   <p id="number" class="invalid">A <b>number</b></p>
   <p id="length" class="invalid">Minimum <b>8 characters</b></p>

</div>
<script>
   var myInput = document.getElementById("PSW");
   var letter = document.getElementById("letter");
   var capital = document.getElementById("capital");
   var number = document.getElementById("number");
   var length = document.getElementById("length");

   // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
   document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>



</div>

</section>

</body>
</html>