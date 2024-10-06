<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
            background-color: 90EE90;
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
            color: #fff;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
       <center><h1> ADD PROFILE</h1></center> 
    <div class="profile-container">
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone_no">phone_no:</label>
            <input type="number" name="phone_no" required>

            <label for="annual_income">annual_income:</label>
            <input type="number" id="annual_income" name="annual_income" required>

            <label for="course">course:</label>
            <input type="text" id="course" name="course" required>

            <button type="submit">Add profile</button>
        </form>
    </div>

</body>
</html>
<?php
    include("session_student.php");
    $prav = $_SESSION['student_id'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone_no =  $_POST["phone_no"];
        $annual_income = $_POST["annual_income"];
        $course = $_POST["course"];
        $select = " SELECT * FROM students WHERE user_id = $prav ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
        }else{
            $insert = "INSERT INTO students(name, email, phone_no, annual_income, course, user_id) VALUES ('$name', '$email','$phone_no','$annual_income','$course', '$prav')";
            mysqli_query($conn, $insert);
            header('location:profile.php');
        }
    }
    $conn->close();
?>

