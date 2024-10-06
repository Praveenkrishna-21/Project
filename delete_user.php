<?php
    include("session_admin.php");
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $sql = "DELETE from registration_data where user_id=$user_id";
        $conn->query($sql);
    }
    header('location:user_disp.php');
    exit;
?>