<?php
   include('session.php');
   include('background.php');
   
   $sql1 = "select func_ID, telefone, CPF,Nome, Cargo from funcionarios" ;
   $result = mysqli_query($db,$sql1);      
?>
<html>
   
   <head>
      <title>Admin </title>
   </head>
   
   <body> 
      <ul class="nav navbar-nav navbar-left ">
          <li>
              <a href = "insereFunc.php">Insere funcionário</a></h2>
          </li>
          <li>  
              <a href = "mudaCota.php">Alterar Cotação</a></h2>
          </li>
          <li>      
              <a href = "alteraFunc.php">Altera funcionário</a></h2>
          </li>
      </ul></br></br></br>    
   </body>
   
</html>