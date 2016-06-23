<html>
<head>
	<style>
    table , td, th{
        border: 1px black solid;
    }
    table{
        border-collapse: collapse;
        width:100%;
    }
    
    th, td {
        text-align: left;
        padding: 8px;
    }
    
    th{
        background-color:#4CAF50;
        color: white;
    }
    </style>
</head>

<?php
   	include("cliente.php");
	   

?>      
</font>
        </br>
<table>
    <tr>
        <th>ID</th>
        <th>Endereço</th>
        <th>Status</th>
    </tr>   
   
   
   <?php
            	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	            $sql1 = "select ID, ender, status from clientes C, entregas E  where C.username = '$login_session'     AND C.cliente_ID = E.cliente_ID";
                 $result = mysqli_query($db,$sql1);
      
		        if (mysqli_num_rows($result) > 0) {
			    // output data of each linha
			    while($linha = mysqli_fetch_assoc($result)) {
                    ?>
	<tr>
        <td><?php echo $linha["ID"]?></td>
        <td><?php echo $linha["ender"]?></td>
        <td><?php echo $linha["status"]?></td>
    </tr>
    <?php
			    } 
		        } else {
			        echo "0 results";
		        }      
        
   
       ?>
	   </table>