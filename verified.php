<?php
  include("session_admin.php");
  $Application_Id="";
  $user_id="";
  $approval_status="";
  $Amount="";
  $error="";
  $success="";
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['Application_Id'])){
      header("location:admin_sch.php");
      exit;
    }
    $Application_Id = $_GET['Application_Id'];
    $sql = "select * from application_status where approval_status = 'pending' and Application_Id = '$Application_Id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      echo "<script>alert('this application is already verified!')</script>";
      header('location:admin_app.php');
      exit;
    }
    $status_id=$row["status_id"];
    $Application_Id=$row["Application_Id"];
    $user_id=$row["user_id"];
    $approval_status=$row["approval_status"];
    $Amount=$row["Amount"];
  }
  else{
    $Application_Id=$_POST["Application_Id"];
    $approval_status=$_POST["approval_status"];
    $Amount=$_POST["Amount"];
    $sql = "update application_status set approval_status='$approval_status', Amount='$Amount' where Application_Id='$Application_Id'";
    $result = $conn->query($sql);
    header('location:admin_app.php');
  }
?>  
<!DOCTYPE html>
<html>
<head>
 <title>verification</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="Admin_page.php">P<sup>2</sup> Scholarship</a>
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
 <h1 class="text-white text-center">  verification </h1>
 </div><br>

 <input type="hidden" name="status_id" value="<?php echo $status_id; ?>" class="form-control"> <br>

 <label> Application id: </label>
 <input type="number" name="Application_Id" value="<?php echo $Application_Id; ?>" class="form-control"> <br>
 
 <label> user id: </label>
 <input type="number" name="user_id" value="<?php echo $user_id; ?>" class="form-control"> <br>


 <label for="approval_status"> Application Status: </label>
<select name="approval_status" class="form-control">
  <option value="pending" <?php echo ($approval_status === 'pending') ? 'selected' : ''; ?>>Pending</option>
  <option value="approved" <?php echo ($approval_status === 'approved') ? 'selected' : ''; ?>>Approved</option>
  <option value="rejected" <?php echo ($approval_status === 'rejected') ? 'selected' : ''; ?>>Rejected</option>
</select>
<br>

 <label> Amount: </label>
 <input type="number" name="Amount" value="<?php echo $Amount; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="admin_app.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>