<?php
   
   include('session.php');

	  $conn = mysqli_connect('localhost', 'root', '', 'cadastro');
	  $sql1 = "select ID, ender, status from clientes C, entregas E  where C.username = '$login_session'     AND C.cliente_ID = E.cliente_ID";
      $result = mysqli_query($db,$sql1);
      
		if (mysqli_num_rows($result) > 0) {
			// output data of each linha
			while($linha = mysqli_fetch_assoc($result)) {
				echo $linha["ID"]. " " . $linha["ender"]. " " . $linha["status"] .  "<br>";
			} 
		} else {
			echo "0 results";
		}      
      
      
?>