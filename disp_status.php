<?php
include("session_student.php");
$prav = $_SESSION['student_id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch data from the database
$sql = "SELECT status_id,Application_Id , user_id, approval_status, Amount FROM application_status where user_id =$prav ";
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
                echo '<tr><th>status_id</th><th>Application_Id</th><th>user_id</th><th>approval_status</th><th>Amount</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr><td>' . $row["status_id"] .'</td><td>' . $row["Application_Id"] . '</td><td>' . $row["user_id"] . '</td><td>' . $row["approval_status"] . '</td><td>' . $row["Amount"] . '</td></tr>';
                }
                echo '</table><br>';
            } else {
                echo "<center>No Scholarships status available at this moment</center>";
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