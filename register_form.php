<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM registration_data WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO registration_data(username, email, password, user_type) VALUES('$username','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_page.php');
      }
   }

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
      <div class="loginbox">
        <img class="logo" src="logo.png">
        <h1>Register now</h1>
        <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            };
         ?>
         <form action="" method="post">
            <label>Username</label>
            <input type="text" name="username"  required placeholder="enter your username" required>
            <label>Email id</label>
            <input type="email" name="email" required placeholder="enter your email" required>
            <label>Password</label>
            <input type="password" name="password" required placeholder="enter your password" required>
            <label>Confirm Password</label>
            <input type="password" name="cpassword" required placeholder="confirm your password" required>
            <select name="user_type" required>
               <option value="student">student</option>
               <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" >
            <p style = "text-align:center">already have an account? </p><a href="login_page.php">login now</a>
         </form>
      </div>
</body>
</html>