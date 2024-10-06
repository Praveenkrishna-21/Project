<?php
  include("session_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>p2 Scholarships Home</title>
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
        <center><h2>Scholarships</h2><br>
        <div class="container my-4">
          <table class="table" border="1">
            <thead>
              <tr>
                <th>scholarship_id</th>
                <th>scholarship_name</th>
                <th>threshold_cgpa</th>
                <th>organization</th>
                <th>last_date</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              @include 'config.php';

              $sql = "select * from scholarships";
              $result = $conn->query($sql);
              if(!$result){
                die("Invalid query!");
              }
              while($row=$result->fetch_assoc()){
                echo "
                <tr>
                <th>$row[scholarship_id]</th>
                <td>$row[scholarship_name]</td>
                <td>$row[threshold_cgpa]</td>
                <td>$row[organization]</td>
                <td>$row[last_date]</td>
                <td>
                    <button><a href='edit.php?scholarship_id=$row[scholarship_id]'>Edit</a></button>
                </td>
                <td>
                    <button><a href='delete.php?scholarship_id=$row[scholarship_id]'>Delete</a></button>
                </td>
                </tr>
                ";
              }
            ?>
            </tbody>
          </table>
        </div>
        <br>
        <button><a href="create_sch.php">Add Scholarship</button>  
        </center>
      </section>
    </main>

    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>

</body>
</html>