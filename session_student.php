<?php 
session_start(); 
include("config.php"); 
if(!isset($_SESSION['student_id'])){ 
    header('location:login_page.php'); 
} 
?>