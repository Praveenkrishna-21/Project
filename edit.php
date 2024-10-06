<?php
  include("session_admin.php");
  $scholarship_id="";
  $scholarship_name="";
  $cgpa="";
  $organization="";
  $last_date="";
  $error="";
  $success="";
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['scholarship_id'])){
      header("location:admin_sch.php");
      exit;
    }
    $scholarship_id = $_GET['scholarship_id'];
    $sql = "select * from scholarships where scholarship_id=$scholarship_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: admin_sch.php");
      exit;
    }
    $scholarship_name=$row["scholarship_name"];
    $threshold_cgpa=$row["threshold_cgpa"];
    $organization=$row["organization"];
    $last_date=$row["last_date"];
  }
  else{
    $scholarship_id = $_POST["scholarship_id"];
    $scholarship_name=$_POST["scholarship_name"];
    $threshold_cgpa=$_POST["threshold_cgpa"];
    $organization=$_POST["organization"];
    $last_date=$_POST["last_date"];

    $sql = "update scholarships set scholarship_name='$scholarship_name', threshold_cgpa='$threshold_cgpa', organization='$organization', last_date='$last_date' where scholarship_id='$scholarship_id'";
    $result = $conn->query($sql);
    header("location: admin_sch.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Update</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
  </style>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
 <div class="profile-container">
 
 <form method="post">
 
 <h1 >  Update Scholarships </h1>

 <input type="hidden" name="scholarship_id" value="<?php echo $scholarship_id; ?>" class="form-control" required> <br>

 <label> scholarship_name: </label>
 <input type="text" name="scholarship_name" value="<?php echo $scholarship_name; ?>" class="form-control" required> <br>

 <label> threshold_cgpa: </label>
 <input type="number" name="threshold_cgpa" value="<?php echo $threshold_cgpa; ?>" class="form-control" required> <br>

 <label> Organization: </label>
 <input type="text" name="organization" value="<?php echo $organization; ?>" class="form-control" required> <br>

 <label> last_date: </label>
 <input type="date" name="last_date" value="<?php echo $last_date; ?>" class="form-control" min="<?php echo date('Y-m-d'); ?>" required> <br>

 <button  type="submit" name="submit"> Submit </button><br>
 <center><a  type="submit" name="cancel" href="admin_sch.php" > Cancel </a></center><br>

 </form>
 </div>
</body>
</html>