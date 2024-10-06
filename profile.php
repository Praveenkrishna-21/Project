<?php
include("session_student.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pgr = $_SESSION['student_id'];
// Fetch data from the database
$sql = "SELECT user_id, name, email, phone_no, annual_income, course FROM students where user_id = $pgr ";
$result = $conn->query($sql);
// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <center><h2>Profile Data</h2><br>
            <div class= "">
                <?php
                    if ($result->num_rows > 0) {
                        echo '<table border = 1 >';
                        echo '<tr><th>user_id</th><th>name</th><th>email</th><th>phone_no</th><th>annual_income</th><th>course</th><th>Action</th></tr>';
                        while ($row = $result->fetch_assoc()) {
                        echo '<tr><td>' . $row["user_id"] .'</td><td>' . $row["name"] . '</td><td>' . $row["email"] . '</td><td>' . $row["phone_no"] . '</td><td>' . $row["annual_income"] . '</td><td>' . $row["course"] . '</td><td><button><a href="update.php">update</button>' . '</td></tr>';
                        }
                        echo '</table><br>';

                    }else{
                        echo "<center><h3>No data found.<h3><br> <button><a href='add_profile.php'>Add Profile</a></button></center>";
                    }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>

      
</body>
</html>
