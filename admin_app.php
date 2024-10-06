<?php
  include("session_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>p2 Scholarships Applications</title>
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
                <li><a href="Admin_page.php">HOME</a></li>
                <li><a href="admin_sch.php">SCHOLARSHIPS</a></li>
                <li><a href="admin_app.php">APPLICATIONS</a></li>
                <li><a href="user_disp.php">USERS</a></li>
                <li><a href="#">HELP</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <center><h2>Applications</h2><br>
            <div class="container my-4">
              <table border="1">
                <thead>
                  <tr>
                    <th>Application_Id</th>
                    <th>scholarship_id</th>
                    <th>user_id</th>
                    <th>apply_date</th>
                    <th>cgpa</th>
                    <th>ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    @include 'config.php';

                    $sql = "SELECT *
                    FROM applications
                    JOIN application_status ON applications.Application_Id = application_status.Application_Id
                    WHERE application_status.approval_status = 'pending';
                    ";
                    $result = $conn->query($sql);
                    if(!$result){
                      die("Invalid query!");
                    }
                    while($row=$result->fetch_assoc()){
                      echo "
                  <tr>
                    <th>$row[Application_Id]</th>
                    <td>$row[scholarship_id]</td>
                    <td>$row[user_id]</td>
                    <td>$row[apply_date]</td>
                    <td>$row[cgpa]</td>
                    <td>
                      <button><a href='verified.php?Application_Id=$row[Application_Id]'>Verify</a></button>
                    </td>
                  </tr>
                  ";
                    }
                  ?>
                </tbody>
              </table><br>
              <button><a href="view_verified_app.php">VIEW APPROVED APPLICATIONS</a></button>
              <br>
              <br>
              <button><a href="view_rejected_app.php">VIEW REJECTED APPLICATIONS</a></button>
              </center>
            </div>
        </section>
    </main>

    <!-- <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer> -->

</body>
</html>