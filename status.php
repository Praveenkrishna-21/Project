<?php
include("session_student.php");
$prav = $_SESSION['student_id'];
$query = "SELECT  * FROM applications where user_id = $prav";
$result2 = mysqli_query($conn, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0]</option>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected = $_POST['columnValues'];
    $select = " SELECT * FROM application_status where  Application_Id = $selected ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Thank you,')</script>"; 
        header('location:disp_status.php');     
    }else{
        $insert = "INSERT  INTO application_status(Application_Id, user_id, approval_status, Amount) VALUES ('$selected', '$prav','pending', $rand)";
        mysqli_query($conn, $insert);
        echo "<script>alert(', $prav! Your scholarship application status has been submitted successfully.')</script>";
        header('location:disp_status.php');
    }
}
$conn->close();
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Application Form</title>
    <style>
        .container{
            width: 300px;
            height: 350px;
            background: #1c2833;
            color: white;
            margin: 180px auto;
            border-radius: 10px;
        }
        h1{
            text-align: center;
            margin-top: -60px;
        }
        button{
            border: none;
            outline: none;
            height: 40px;
            border-radius: 20px;
            background: lightred;
            color: black;
            font-size: 20px;
            cursor: pointer;
            margin:0px 0px 20px 100px;
        }
        input,select{
            width: 80%;
            margin: 0 0 20px 20px;
        }
        label,select{
            font-size: 18px;
            display: block;
            margin-left: 20px;
        }
        button:hover{
    background: lightblue;
}
    </style>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
    <div class="container">
        <form action="" method="post">
            <h1>Scholarship Application Status</h1>
            <br>
            <label for="columnValues">Select Application ID:</label>
        <select name="columnValues">
            <?php echo $options;?>
        </select>
        <br>
            <button type="submit">STATUS</button>
        <br>
        <button><a href="student_page.php">Home</button>
        </form>
        
    </div>
</body>
</html>