<?php
include("session_student.php");
$prav = $_SESSION['student_id'];
if(!isset($_SESSION['student_id'])){
    header('location:login_page.php');
 }
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch data from the database
$sql = "SELECT scholarship_id,scholarship_name , threshold_cgpa, organization, last_date FROM scholarships ";
$result = $conn->query($sql);
// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarships</title>
    <link rel="stylesheet" href="style3.css">
    <style>
        <style>
            table {
                border-collapse: collapse;
                width: 80%;
                margin: 20px auto;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            button {
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                cursor: pointer;
            }

            button a {
                color: white;
                text-decoration: none;
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
            <center><h2>List of Scholarships</h2><br>

            <?php
            if ($result->num_rows > 0) {
                echo '<table border = 1 >';
                echo '<tr><th>scholarship_id</th><th>scholarship_name</th><th>threshold_cgpa</th><th>organization</th><th>last_date</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><td>' . $row["scholarship_id"] .'</td><td>' . $row["scholarship_name"] . '</td><td>' . $row["threshold_cgpa"] . '</td><td>' . $row["organization"] . '</td><td>' . $row["last_date"] . '</td></tr>';
                }
                echo '</table><br>';
                echo '<center><button><a href="application.php">Apply</button></center><br>';
            } else {
                echo "No Scholarships available at this moment";
            }
            ?>
            </center>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>
</body>
</html>