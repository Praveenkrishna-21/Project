<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $select = " SELECT * FROM registration_data WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['user_id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'student'){

         $_SESSION['student_id'] = $row['user_id'];
         header('location:student_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
    <div class="loginbox">
    <form action="" method="post">
        <img class="logo" src="logo.png" width="50px">
        <h1>Sign In</h1>
            <label>Email</label>
            <input type="email" name="email" required placeholder="Enter email">
            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter Password">
            <input type="submit" name="submit" value="login now" class="form-btn">
        <a href="#">Forgot Password?</a>
        <p align="center">don't have an account?</p><br><a href="register_form.php">register now</a>
    </form>
    </div>
</body>
</html>
