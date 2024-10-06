<?php 
session_start(); 
include("config.php"); 
if(!isset($_SESSION['admin_id'])){ 
    header('location:login_page.php'); 
} 
?>