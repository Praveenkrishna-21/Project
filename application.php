<?php
include("session_student.php");
$prav = $_SESSION['student_id'];
$query = "SELECT DISTINCT scholarship_id FROM scholarships";
$result2 = mysqli_query($conn, $query);
$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[0]</option>";
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selected = $_POST['columnValues'];
        $cgpa = $_POST["cgpa"];
        $currentDate = date("Y-m-d");
        $select = " SELECT * FROM applications where scholarship_id = $selected and user_id = $prav ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Sorry, $prav! Your Application is submitted')</script>";    
         }else{
               $insert = "INSERT INTO applications(scholarship_id, user_id, apply_date, cgpa) VALUES ('$selected', '$prav','$currentDate','$cgpa')";
               mysqli_query($conn, $insert);
            //    header('location:profile.php');
            echo "<script>alert('Thank you, $prav! Your scholarship application has been submitted successfully.')</script>";
         }
    }
    $conn->close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Application Form</title>
    <link rel="stylesheet" href="style3.css">
    <style>
        .container {
    width: 50%;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    text-align: center;
    color: #333;
}

label {
    margin-top: 10px;
    margin-bottom: 5px;
    color: #555;
}

select,
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">

    <header>
        <h1><i>P<sup>2</sup> Scholarships</i></h1>
        <nav>
            <ul>
                <li><a href="student_page.php">HOME</a></li>
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="stu_scholarships.php">SCHOLARSHIPS</a></li>
                <li><a href="disp_app_sch.php">APPLIED SCHOLARSHIPS</a></li>
                <li><a href="disp_status.php">APPLICATION STATUS</a></li>
                <li><a href="#">HELP</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <center><div class="container">
        <form action="" method="post">
            <h1>Scholarship Application Form</h1>
            <br>
            <label for="columnValues">Select Scholarship ID:</label>
        <select name="columnValues">
            <?php echo $options;?>
        </select>
        <br>
            <!-- Academic Information -->
            <label for="cgpa">CGPA:</label>
            <input type="number" name="cgpa" required>
            <br>
            <!-- Submit Button -->
            <button type="submit">Submit Application</button>
        </form>
        
    </div></center>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>

</body>
</html>