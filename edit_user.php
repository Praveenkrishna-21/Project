<?php
  include("session_admin.php");
  $user_id="";
  $username="";
  $email="";
  $password="";
  $error="";
  $success="";
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['user_id'])){
      header("location:user_disp.php");
      exit;
    }
    $user_id = $_GET['user_id'];
    $sql = "select * from registration_data where user_id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: user_disp.php");
      exit;
    }
    $username=$row["username"];
    $email=$row["email"];
    $password=$row["password"];
  }
  else{
    $user_id = $_POST["user_id"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql = "update registration_data set username='$username', email='$email', email='$email',password='$password' where user_id='$user_id'";
    $result = $conn->query($sql);
    header("location: user_disp.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>update</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">P<sup>2</sup> Scholarship</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Admin_page.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Member </h1>
 </div><br>

 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" class="form-control" required> <br>

 <label> username: </label>
 <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required> <br>

 <label> email: </label>
 <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required> <br>

 <label> password: </label>
 <input type="text" name="password" value="<?php echo $password; ?>" class="form-control" required> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="user_disp.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>