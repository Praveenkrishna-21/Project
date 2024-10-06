<?php
    include("session_admin.php");
    if(isset($_GET['scholarship_id'])){
        $scholarship_id = $_GET['scholarship_id'];
        $sql = "DELETE from scholarships where scholarship_id=$scholarship_id";
        $conn->query($sql);
    }
    header('location:admin_sch.php');
    exit;
?>