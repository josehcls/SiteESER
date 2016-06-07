<?php
   session_start();
   
   include('session.php');
      
   switch($tipo_session) {
       
       case 1:
            header("Location: admin.php");
            break;
   
       case 2:
            header("Location: funcionario.php");
            break;
            
       case 3:
           header("Location: cliente.php");
           break;

   }
?>