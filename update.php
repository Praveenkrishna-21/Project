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
            color: #fff;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body style="background:linear-gradient(to right, rgb(249, 168, 212), rgb(216, 180, 254), rgb(129, 140, 248));">
    
    <div class="profile-container">
    <center><h1> UPDATE PROFILE</h1></center>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"   required>

            <label for="email">email:</label>
            <input type="email" id="email" name="email"  required>

            <label for="phone_no">phone_no:</label>
            <input type="number" name="phone_no"  required>

            <label for="annual_income">annual_income:</label>
            <input type="number" id="annual_income" name="annual_income"  required>

            <label for="course">course:</label>
            <input type="text" id="course" name="course"  required>

            <button type="submit">Update Profile</button>
        </form>
    </div>

</body>
</html>
<?php
include("session_student.php");
$prav = $_SESSION['student_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $annual_income = $_POST["annual_income"];
    $course = $_POST["course"];
    $update_query = "UPDATE students SET name='$name', email='$email', phone_no='$phone_no', annual_income='$annual_income', course='$course' WHERE user_id=$prav";
    if ($conn->query($update_query) === TRUE) {
        echo "Record updated successfully";
        header('location:profile.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>

