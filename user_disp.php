<?php
  include("session_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>p2 Scholarships Users</title>
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
            <center><h2>Users!</h2><br>
            <div class="container my-4">
              <table border=1>
              <thead>
                <tr>
                  <th>user_id</th>
                  <th>username</th>
                  <th>email</th>
                  <th>password</th>
                  <th>user_type</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  @include 'config.php';
                  $sql = "select * from registration_data where user_type != 'admin'";
                  $result = $conn->query($sql);
                  if(!$result){
                    die("Invalid query!");
                  }
                  while($row=$result->fetch_assoc()){
                    echo "
                <tr>
                  <th>$row[user_id]</th>
                  <td>$row[username]</td>
                  <td>$row[email]</td>
                  <td>$row[password]</td>
                  <td>$row[user_type]</td>
                  <td>
                    <button><a href='edit_user.php?user_id=$row[user_id]'>Edit</a></button>
                    <button><a href='delete_user.php?user_id=$row[user_id]'>Delete</a></button>
                  </td>
                </tr>
                ";
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
    </main>

    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>

</body>
</html>