<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username, password, tipo from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $password_session = $row['password'];
   $tipo_session = (int) $row['tipo'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>