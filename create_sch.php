<?php
    include("session_admin.php");
    if(isset($_POST['submit'])){
        $scholarship_name = $_POST['scholarship_name'];
        $threshold_cgpa = $_POST['threshold_cgpa'];
        $organization = $_POST['organization'];
        $last_date = $_POST['last_date'];
        $q = " INSERT INTO scholarships (scholarship_name, threshold_cgpa, organization,last_date) VALUES ( '$scholarship_name', '$threshold_cgpa', '$organization','$last_date' )";
        $query = mysqli_query($conn,$q);
        header('location:admin_sch.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Add Scholarship</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">P<sup>2</sup> Scholarship</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin_sch.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create_sch.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Add new Scholarship</h1>
 </div><br>

 <label> scholarship_name: </label>
 <input type="text" name="scholarhsip_name" class="form-control" required> <br>

 <label> threshold_cgpa: </label>
 <input type="number" name="threshold_cgpa" class="form-control" required> <br>

 <label> organization: </label>
 <input type="text" name="organization" class="form-control" required> <br>

 <label> last_date: </label>
 <input type="date" name="last_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" required> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="admin_sch.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>