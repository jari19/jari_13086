<?php
session_start();
  // include('connect.php');
   
   
   $user_check = $_SESSION['userid'];
   
   $ses_sql = mysqli_query($db,"select userid from user_13086 where userid = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['userid'];
   
   if(!isset($_SESSION['userid'])){
      header("location:login.php");
   }
?>